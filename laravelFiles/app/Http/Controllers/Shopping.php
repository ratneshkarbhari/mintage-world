<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\ProductSpecial;

class Shopping extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    private function fetch_random_products($catIds){

        return json_decode(json_encode(DB::table('products')->where('category', $catIds)->where("status","Active")->where("instock",">",0)->where("featured",1)->limit(7)->paginate(12)),TRUE);

    }

    function shop()
    {

        if (!$featuredCoins = Cache::get("featured_coins")) {
            
            $coinsQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (18,24,25,26,27,28) LIMIT 7';

            $featuredCoins = json_decode(json_encode(DB::select($coinsQuery)),TRUE);

            Cache::set("featured_coins",$featuredCoins);
            
        }

        if (!$featuredNotes = Cache::get("featured_notes")) {
            
            $notesQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (35,36,37,38,39,40,41,42,43) LIMIT 7';

            $featuredNotes = json_decode(json_encode(DB::select($notesQuery)),TRUE);

            Cache::set("featured_notes",$featuredNotes);
            
        }
        

        if (!$featuredAccessories = Cache::get("featured_accessories")) {

            $accessoryQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (11,12,13,14) LIMIT 7';

            $featuredAccessories = json_decode(json_encode(DB::select($accessoryQuery)),TRUE);


            Cache::set("featured_accessories",$featuredNotes);


        }


        if (!$featuredGiftCards = Cache::get("featured_gift_cards")) {


            $giftCardQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock != 0 AND category IN (6) LIMIT 7';

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
    function shop_list($categorySlug,Request $request)
    {


        
        $categorySlugParts = explode("-",$categorySlug);

        $categoryProducts = Product::select('*');


        $categoryProducts = $categoryProducts->where("instock","!=",0);


        $categoryProducts = $categoryProducts->where("category",$categorySlugParts[0]);

        if ($request->has('price_sort')&&$request->price_sort!="") {

            $categoryProducts = $categoryProducts->orderBy("price",$request->price_sort);

        }

        if($request->has("denomination")&&$request->denomination!=""){

            $categoryProducts = $categoryProducts->where("denomination",$request->denomination);

        }


        
        if($request->has("governor")&&$request->governor!=""){

            $categoryProducts = $categoryProducts->where("governor",$request->governor);

        }

        $categoryProducts  = $categoryProducts->paginate(12);  
        
        $maincatdata = ProductCategory::find($categorySlugParts[0]);

        if($maincatdata["parent"]!=0){
            $parent_category = ProductCategory::find($maincatdata["parent"]);            
            if($parent_category["parent"]!=0){
                $grand_parent_category = ProductCategory::find($parent_category["parent"]);            
            }else{
                $grand_parent_category = NULL;
            }
        }else{
            $parent_category = NULL;
        }


        $total = count($categoryProducts);

        if ($total==0) {

            $productCategory = new ProductCategory();

            $childCategories = $productCategory->where("parent",$categorySlugParts[0])->paginate(12);

            $childCatIds = [];

            foreach($childCategories as $childCategory){

                $childCatIds[] = $childCategory["id"];

            }



            $categoryProducts = Product::select('*');


            $categoryProducts = $categoryProducts->where("category",$childCatIds);

            $categoryProducts = $categoryProducts->where("instock","!=",0);


            if ($request->has('price_sort')&&$request->price_sort!="") {
    
                $categoryProducts = $categoryProducts->orderBy("price",$request->price_sort);
    
            }
    
            if($request->has("denomination")&&$request->denomination!=""){
    
                $categoryProducts = $categoryProducts->where("denomination",$request->denomination);
    
            }
    
    
            
            if($request->has("governor")&&$request->governor!=""){
    
                $categoryProducts = $categoryProducts->where("governor",$request->governor);
    
            }
    
            $categoryProducts  = $categoryProducts->paginate(12);  
    


            $total = count($categoryProducts);


        }

        $currentPage = $categoryProducts->currentPage();
        $perPage = $categoryProducts->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        if(!isset($grand_parent_category)){
            $grand_parent_category = NULL;
        }
        
        $this->page_loader("shop_list", [
            "title" => "Buy Coins of ". $maincatdata["cat_name"] ." Online | Mintage World",
            "grand_parent_category" => $grand_parent_category,
            "parent_category" => $parent_category,
            "category" => $maincatdata,
            "category_products" => $categoryProducts,
            "product_count" => count($categoryProducts),
            "pagination_string" => $paginationInfoString
        ]);
    }
    function view_product($productSlug)
    {


        $slugParts = explode("-",$productSlug);

        $product = Product::where("id",$slugParts[0])->with("product_category")->with("product_images")->with("product_ratings")->first();



        if($product){

            $this->page_loader("view_product", [
                "title" => "Buy ".$product["name1"]." Online",
                "product" => $product,
                "category" => $product["product_category"]
            ]);

        }else{

            return redirect()->to(url("shop"));

        }


    }

    function check_note_availability (Request $request){

        $productSpecial = new ProductSpecial();

        $productId = $request->pid;
        $quantity = $request->quantity;
        $catId = $request->cat_id;
        $price = $request->price;
        $date = $request->date;


        if ($productSpecial->where("product_id",$productId)->where("date_start",$date)->where("status","Yes")) {
            
            return json_encode([
                "message" => "Available at premium price"
            ]);
            
        }

        if ($productSpecial->where("product_id",$productId)->where("date_start",$date)->where("status","No")) {
            return json_encode([
                "message" => "Not Available"
            ]);
        }

        if (!$productSpecial->where("product_id",$productId)->where("date_start",$date)) {

            return json_encode([
                "message" => "Product Available"
            ]);

        }

    }

}
