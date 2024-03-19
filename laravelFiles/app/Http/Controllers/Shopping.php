<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\ProductSpecial;

class Shopping extends Controller
{
    private function page_loader($viewName, $data)
    {
        if (!isset($data['description'])) {
            $data['description'] = "";
        }

        if (!isset($data['keywords'])) {
            $data['keywords'] = "";
        }
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    // private function fetch_random_products($catIds)
    // {

    //     return json_decode(json_encode(DB::table('products')->where('category', $catIds)->where("status", "Active")->where("instock", ">", 0)->where("featured", 1)->limit(7)->paginate(12)), TRUE);
    // }

    function shop()
    {

        if (!$featuredCoins = Cache::get("featured_coins")) {

            $coinsQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (18,24,25,26,27,28) LIMIT 7';

            $featuredCoins = json_decode(json_encode(DB::select($coinsQuery)), TRUE);

            Cache::set("featured_coins", $featuredCoins);
        }

        if (!$featuredNotes = Cache::get("featured_notes")) {

            $notesQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (35,36,37,38,39,40,41,42,43) LIMIT 7';

            $featuredNotes = json_decode(json_encode(DB::select($notesQuery)), TRUE);

            Cache::set("featured_notes", $featuredNotes);
        }


        if (!$featuredAccessories = Cache::get("featured_accessories")) {

            $accessoryQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (11,12,13,14) LIMIT 7';

            $featuredAccessories = json_decode(json_encode(DB::select($accessoryQuery)), TRUE);


            Cache::set("featured_accessories", $featuredNotes);
        }


        if (!$featuredGiftCards = Cache::get("featured_gift_cards")) {


            $giftCardQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (6) LIMIT 7';

            $featuredGiftCards = json_decode(json_encode(DB::select($giftCardQuery)), TRUE);

            Cache::get("featured_gift_cards", $featuredGiftCards);
        }



        $this->page_loader("shop", [
            "title" => "Shopping | Buy Coins, Banknotes, Stamp, Accessories and Greeting Cards Online | Mintage World",
            "random_coins" => $featuredCoins,
            "random_notes" => $featuredNotes,
            "random_accessories" => $featuredAccessories,
            "random_greeting_cards" => $featuredGiftCards,
            "description" => "Enhance your collection of Coins, Banknotes &amp; Stamps with just a few clicks. Also buy unique greeting cards with currency note featuring a date of your choice &amp; world-class collectibles accessories!
            "
        ]);
    }
    function shop_list($categorySlug, Request $request)
    {
        
        
        $categorySlugParts = explode("-",$categorySlug);
                
        $productsQuery = Product::select('products.*', 'shopping_category.parent AS parent')
        ->join('shopping_category', 'shopping_category.id', '=', 'products.category')
        ->where('products.status', 'Active')
        ->where('products.instock', '>=', 1)
        ->where('products.special_status', 2)
        ->where(function ($query) use ($categorySlugParts) {
            $query->where('products.category', $categorySlugParts[0])
                ->orWhere('shopping_category.parent', $categorySlugParts[0]);
        })
        ->where(function ($query) use ($categorySlugParts){
            $query->where('shopping_category.main_parent', $categorySlugParts[0])
                ->orWhere(function ($query) {
                    $query->where('products.instock', '>=', 1)
                        ->where('products.special_status', 2);
                });
        });
        
        if ($request->has('price_sort')&&$request->price_sort!="") {

            $productsQuery = $productsQuery->orderBy("price",$request->price_sort);


        }

        if($request->has("denomination")&&$request->denomination!=""){

            $productsQuery = $productsQuery->where("denomination",$request->denomination);

        }

        
        if($request->has("governor")&&$request->governor!=""){

            $productsQuery = $productsQuery->where("governor",$request->governor);

        }

        $categoryProducts = $productsQuery->paginate(12)->withQueryString();
        

        $maincatdata = ProductCategory::find($categorySlugParts[0]);

        $parent_category = ProductCategory::find($maincatdata["parent"]);


        $total = $categoryProducts->total();
        
        $currentPage = $categoryProducts->currentPage();
        $perPage = $categoryProducts->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        if($to==0){
            
        $paginationInfoString = "Coming soon";



        }else{
            
        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";


        }
        if (!isset($grand_parent_category)) {
            $grand_parent_category = NULL;
        }


        $this->page_loader("shop_list", [
            "title" => $maincatdata['meta_title'],
            "grand_parent_category" => $grand_parent_category,
            "parent_category" => $parent_category,
            "category" => $maincatdata,
            "category_products" => $categoryProducts,
            "product_count" => count($categoryProducts),
            "pagination_string" => $paginationInfoString,
            "totalRecords" => $total,
            "footer_content" => $maincatdata["desc1"],
            "description" => $maincatdata['meta_content'],
            "keywords" => $maincatdata["meta_keywords"],
            
        ]);
    }
    function view_product($productSlug)
    {


        $slugParts = explode("-", $productSlug);

        $product = Product::where("id", $slugParts[0])->with("product_category")->with("product_images")->with('product_ratings', function($query) {
            return $query->where('approval', 1);
        })->first();


        $relatedProducts = json_decode(json_encode(DB::table("products")
        ->select("products.*")
        ->where("products.category", "=", $product["category"])
        ->where("products.id", "!=", $product["id"])
        ->where("products.status", "=", 'Active')
        ->limit(6)
        ->inRandomOrder()
        ->get()),TRUE);


        if ($product) {

            $this->page_loader("view_product", [
                "title" => "Buy " . $product["name1"] . " Online",
                "product" => $product,
                "related_products" => $relatedProducts,
                "category" => $product["product_category"],
                "keywords" => $product['keywords'],
                "description" => "Shop online for ".$product['name1']." at lowest price in India. Buy best quality products with free shipping on Mintage World."
            ]);
        } else {

            return redirect()->to(url("shop"));
        }
    }

    function add_product_rating(Request $request){

        $name = $request->UserName;
        $comment = $request->comment;
        $rating = $request->rating;
        $productId = $request->product_id;

        $productData = Product::find($productId);

        $productRatingModel = new ProductRating();

        $created = $productRatingModel->create([
            "member_id" => session("member_id"),
            "product_id" => $productId,
            "user_name" => $name,
            "review_headline" => NULL,
            "rating_score" => $rating,
            "comments" => $comment,
            "delivery_comment" => NULL,
            "approval" => NULL,
            "user_ip"=>$_SERVER["REMOTE_ADDR"],
            "user_agent" => $_SERVER['HTTP_USER_AGENT']
        ]);

        if ($created) {
            return redirect()->to(url("view-product/".$productId."-".$productData["custom_url"]."?review_post_success=TRUE"));
        }

    }

    function check_note_availability(Request $request)
    {



        $productSpecial = new ProductSpecial();

        $productId = $request->product_id;
        $quantity = $request->quantity;
        $catId = $request->cat_id;
        $price = $request->price;
        $date = $request->date."-".$request->month."-".$request->year;


        $res = $productSpecial->where("product_id",$productId)->where("date_start",$date)->where("status","Yes")->first();


        if ($res) {

            return json_encode([
                "message" => "Available at premium price",
                "premium_price" => $res["price"]
            ]);
        } else {

            

            if ($res = $productSpecial->where("product_id", $productId)->where("date_start", $date)->where("status", "No")->first()) {

                return json_encode([
                    "message" => "Not Available"
                ]);
            } else {

                return json_encode([
                    "message" => "Product Available"
                ]);
            }
        }




    }
}
