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

    function add_to_cart_exe(Request $request){

        $product = Product::find($request->pid);
        if(isset(session("cart")[$product["id"]])){

            if($product["instock"]>=(session("cart")[$product["id"]]["quantity"]+$request->quantity)){

                if(session("member_id")){
    
                    $cartObj = session("cart");
        
                    if(isset($cartObj[$request->pid]["quantity"])){
    
                        $qty = $cartObj[$request->pid]["quantity"]+$request->quantity;
    
                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $qty,
                            "amount" => $product["price"]*$qty,
                            "date_added" => date("d/m/y")
                        ];
    
                    }else{
    
                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $request->quantity,
                            "amount" => $product["price"]*$request->quantity,
                            "date_added" => date("d/m/y")
                        ];
                        
                    }
    
                }else{
        
                    $cartObj = session("cart");
        
                    if(isset($cartObj[$request->pid]["quantity"])){
    
                        $qty = $cartObj[$request->pid]["quantity"]+$request->quantity;
    
                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $qty,
                            "amount" => $product["price"]*$qty,
                            "date_added" => date("d/m/y")
                        ];
                
        
    
                    }else{
    
                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $request->quantity,
                            "amount" => $product["price"]*$request->quantity,
                            "date_added" => date("d/m/y")
                        ];
                
        
    
                    }
    
        
                }
        
                
                session([
                    "cart" => $cartObj
                ]);
    
                return "added-to-cart";
    
            }else{
    
                return "out-of-stock";
    
            }

        }else{

            if($product["instock"]>=$request->quantity){

                if(session("member_id")){
    
                    $cartObj = session("cart");
        
                    if(isset($cartObj[$request->pid]["quantity"])){
    
                        $qty = $cartObj[$request->pid]["quantity"]+$request->quantity;
    
                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $qty,
                            "amount" => $product["price"]*$qty,
                            "date_added" => date("d/m/y")
                        ];
    
                    }else{
    
                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $request->quantity,
                            "amount" => $product["price"]*$request->quantity,
                            "date_added" => date("d/m/y")
                        ];
                        
                    }
    
                }else{
        
                    $cartObj = session("cart");
        
                    if(isset($cartObj[$request->pid]["quantity"])){
    
                        $qty = $cartObj[$request->pid]["quantity"]+$request->quantity;
    
                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $qty,
                            "amount" => $product["price"]*$qty,
                            "date_added" => date("d/m/y")
                        ];
                
        
    
                    }else{
    
                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product_id" => $request->pid,
                            "product_price" => $product["price"],
                            "quantity" => $request->quantity,
                            "amount" => $product["price"]*$request->quantity,
                            "date_added" => date("d/m/y")
                        ];
                
        
    
                    }
    
        
                }
        
                
                session([
                    "cart" => $cartObj
                ]);
    
                return "added-to-cart";
    
            }else{
    
                return "out-of-stock";
    
            }

        }




    }

    function cart_page()
    {


        if(session("cart")){

            $cartItems = session("cart");

        }else{
            $cartItems = [];
        }
        if(isset($_COOKIE["discount"])){
            $discount = $_COOKIE["discount"];
        }else{
            $discount = 0.00;
        }


        $this->page_loader("list_of_cart", [
            "title" => "Cart | Mintage World",
            "cart_items" => $cartItems,
            "discount" => $discount
        ]);
    }

    function increase_cart_item(Request $request){


        
        $product = Product::find($request->pid);


        $cartItems = session("cart");

        $finalQty= $cartItems[$request->pid]["quantity"] =$cartItems[$request->pid]["quantity"] + 1;

        if($product["instock"]>=$finalQty){

            if (session(["cart"=>$cartItems])) {

                return 'increased-from-cart';
                
            } else {

                return 'not-increased-from-cart';
                
            }

        }


        

        
        
    }

    function decrease_cart_item(Request $request){



        $product = Product::find($request->pid);


        $cartItems = session("cart");

        $finalQty= $cartItems[$request->pid]["quantity"] = $cartItems[$request->pid]["quantity"] - 1;

        if($product["instock"]>=$finalQty){

            if (session(["cart"=>$cartItems])) {
                return 'decreased-from-cart';
            } else {

                return 'not-decreased-from-cart';
                
            }

        }
        

        
        
    }


    function delete_cart_item(Request $request){

        $pid = $request->pid;

        $cartItems = session("cart");

        unset($cartItems[$pid]);

        if (session(["cart"=>$cartItems])) {
            return TRUE;
        } else {
            return FALSE;
        }


    }

    function checkout()
    {
        $this->page_loader("Checkout", [
            "title" => "checkout | Mintage World"
        ]);
    }
    function payment()
    {
        $this->page_loader("payment", [
            "title" => "Payment | Mintage World"
        ]);
    }

    function recalculate_subtotal(){
        $subtotal = 0.00;


        foreach(session("cart") as $cartItem){

            $subtotal+=$cartItem["amount"];

        }
        return $subtotal;
    }

}
