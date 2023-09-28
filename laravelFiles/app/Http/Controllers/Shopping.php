<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class Shopping extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    private function fetch_random_products($catIds){

        return json_decode(json_encode(DB::table('products')->where('category', $catIds)->where("status","Active")->where("instock",">",0)->where("featured",1)->limit(7)->get()),TRUE);

    }

    function shop()
    {

        if (!$featuredCoins = Cache::get("featured_coins")) {
            
            $coinsQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (18,24,25,26,27,28) LIMIT 7';

            $featuredCoins = json_decode(json_encode(DB::select($coinsQuery)),TRUE);

            Cache::set("featured_coins",$featuredCoins);
            
        }

        if (!$featuredNotes = Cache::get("featured_notes")) {
            
            $notesQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (35,36,37,38,39,40,41,42,43) LIMIT 7';

            $featuredNotes = json_decode(json_encode(DB::select($notesQuery)),TRUE);

            Cache::set("featured_notes",$featuredNotes);
            
        }
        
        if (!$featuredAccessories = Cache::get("featured_accessories")) {

            $accessoryQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (11,12,13,14) LIMIT 7';

            $featuredAccessories = json_decode(json_encode(DB::select($accessoryQuery)),TRUE);
            Cache::set("featured_accessories",$featuredNotes);


        }


        if (!$featuredGiftCards = Cache::get("featured_gift_cards")) {


            $giftCardQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (6) LIMIT 7';

            $featuredGiftCards = json_decode(json_encode(DB::select($giftCardQuery)),TRUE);

            Cache::get("featured_gift_cards",$featuredGiftCards);

        }


        $this->page_loader("shop", [
            "title" => "Shopping | Buy Coins, Banknotes, Stamp, Accessories and Greeting Cards Online | Mintage World",
            "random_coins" => $featuredCoins,
            "random_notes" => $featuredNotes,
            "random_accessories" => $featuredAccessories,
            "random_greeting_cards" => $featuredGiftCards
        ]);
    }
    function shop_list($categorySlug)
    {

        $categorySlugParts = explode("-",$categorySlug);

        $categoryProducts = Product::where("category",$categorySlugParts[0])->with("product_category")->with("product_images")->paginate(12);


        $maincatdata = ProductCategory::find($categorySlugParts[0]);

        $total = $categoryProducts->total();

        if ($total==0) {
            
            $productCategory = new ProductCategory();

            $childCategories = $productCategory->where("parent",$categorySlugParts[0])->get();

            $childCatIds = [];

            foreach($childCategories as $childCategory){

                $childCatIds[] = $childCategory["id"];

            }

            $categoryProducts = Product::where("category",$childCatIds)->with("product_category")->with("product_images")->paginate(12);

            $total = $categoryProducts->total();
            
        }

        $currentPage = $categoryProducts->currentPage();
        $perPage = $categoryProducts->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        
        $this->page_loader("shop_list", [
            "title" => "Buy Coins of ". $maincatdata["cat_name"] ." Online | Mintage World",
            "category" => ProductCategory::find($categorySlugParts[0]),
            "category_products" => $categoryProducts,
            "product_count" => count($categoryProducts),
            "pagination_string" => $paginationInfoString
        ]);
    }
    function view_product($productSlug)
    {


        $slugParts = explode("-",$productSlug);

        $product = Product::where("id",$slugParts[0])->with("product_category")->with("product_images")->with("product_ratings")->first();

        $this->page_loader("view_product", [
            "title" => "Buy ".$product["name1"]." Online",
            "product" => $product
        ]);
    }
}
