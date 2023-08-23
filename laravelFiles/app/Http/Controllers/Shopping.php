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

        return json_decode(json_encode(DB::table('products')->where('category', $catIds)->where("status","Active")->where("instock",">",0)->where("instock","!=",NULL)->inRandomOrder()->limit(7)->get()),TRUE);


    }

    function shop()
    {

        $randomCoins  = $this->fetch_random_products([18,24,25,26,27,28]);
        $randomNotes  = $this->fetch_random_products([35,36,37,38,39,40,41,42,43]);
        $randomAccessories = $this->fetch_random_products([11,12,13,14]);
        $randomGc = $this->fetch_random_products([6]);



        $this->page_loader("shop", [
            "title" => "Shopping | Buy Coins, Banknotes, Stamp, Accessories and Greeting Cards Online | Mintage World",
            "random_coins" => $randomCoins,
            "random_notes" => $randomNotes,
            "random_accessories" => $randomAccessories,
            "random_greeting_cards" => $randomGc
        ]);
    }
    function shop_list($categorySlug)
    {

        $categorySlugParts = explode("-",$categorySlug);

        $categoryProducts = Product::where("category",$categorySlugParts[0])->with("product_category")->with("product_images")->get();

        
        $this->page_loader("shop_list", [
            "title" => "Buy Amazing Old World Currency Notes Online | Mintage World",
            "category" => ProductCategory::find($categorySlugParts[0]),
            "category_products" => $categoryProducts,
            "product_count" => count($categoryProducts)
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
