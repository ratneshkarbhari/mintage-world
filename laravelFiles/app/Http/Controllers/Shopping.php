<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
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

        return json_decode(json_encode(DB::table('ultra_products')->where('category', $catIds)->where("status","Active")->where("instock","!=",NULL)->inRandomOrder()->limit(7)->get()),TRUE);


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
    function shop_list()
    {
        $this->page_loader("shop_list", [
            "title" => "Buy Amazing Old World Currency Notes Online | Mintage World"
        ]);
    }
    function view_product($productSlug)
    {


        $slugParts = explode("-",$productSlug);

        $product = Product::find($slugParts[0]);


        $this->page_loader("view_product", [
            "title" => "Buy ".$product["name1"]." Online",
            "product" => $product
        ]);
    }
}
