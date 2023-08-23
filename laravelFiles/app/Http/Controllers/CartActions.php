<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartActions extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function add_to_cart(Request $request){


        if(Product::find($request->productId)["instock"]>=$request->quantity){

            if(session("member_id")){

                

            }else{
    
                $cartObj = session("cart");
    
                $cartObj[$request->productId] = [
                    "member_id" => "NA",
                    "product_id" => $request->productId,
                    "quantity" => $cartObj[$request->productId]["quantity"]+$request->quantity,
                    "date_added" => date("d/m/y")
                ];
        
                session([
                    "cart" => $cartObj
                ]);
    
            }
    

            return "added-to-cart";

        }else{

            return "out-of-stock";

        }



    }

    function cart_page()
    {

        if(session("cart")){

            $cartItems = session("cart");

        }else{
            $cartItems = [];
        }
        $this->page_loader("list_of_cart", [
            "title" => "Cart | Mintage World",
            "cart_items" => $cartItems
        ]);
    }
    function checkout()
    {
        $this->page_loader("checkout", [
            "title" => "checkout | Mintage World"
        ]);
    }
    function payment()
    {
        $this->page_loader("payment", [
            "title" => "Payment | Mintage World"
        ]);
    }
}
