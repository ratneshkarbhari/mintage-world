<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use App\Models\Member;
use App\Models\Country;
use App\Models\MemberAddress;
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

    function add_to_cart_exe(Request $request)
    {

        $product = Product::find($request->pid);
        if (isset(session("cart")[$product["id"]])) {

            if ($product["instock"] >= (session("cart")[$product["id"]]["quantity"] + $request->quantity)) {

                if (session("member_id")) {

                    $cartObj = session("cart");

                    if (isset($cartObj[$request->pid]["quantity"])) {

                        $qty = $cartObj[$request->pid]["quantity"] + $request->quantity;

                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product" => $product,
                            "quantity" => $qty,
                            "amount" => $product["price"] * $qty,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    } else {

                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product" => $product,
                            "quantity" => $request->quantity,
                            "amount" => $product["price"] * $request->quantity,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    }
                } else {

                    $cartObj = session("cart");

                    if (isset($cartObj[$request->pid]["quantity"])) {

                        $qty = $cartObj[$request->pid]["quantity"] + $request->quantity;

                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product" => $product,
                            "quantity" => $qty,
                            "amount" => $product["price"] * $qty,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    } else {

                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product" => $product,
                            "quantity" => $request->quantity,
                            "amount" => $product["price"] * $request->quantity,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    }
                }


                session([
                    "cart" => $cartObj,
                    "cart_count" => count($cartObj)
                ]);

                return "added-to-cart";
            } else {

                return "out-of-stock";
            }
        } else {

            if ($product["instock"] >= $request->quantity) {

                if (session("member_id")) {

                    $cartObj = session("cart");

                    if (isset($cartObj[$request->pid]["quantity"])) {

                        $qty = $cartObj[$request->pid]["quantity"] + $request->quantity;

                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product" => $product,
                            "quantity" => $qty,
                            "amount" => $product["price"] * $qty,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    } else {

                        $cartObj[$request->pid] = [
                            "member_id" => session("member_id"),
                            "product" => $product,
                            "quantity" => $request->quantity,
                            "amount" => $product["price"] * $request->quantity,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    }
                } else {

                    $cartObj = session("cart");

                    if (isset($cartObj[$request->pid]["quantity"])) {

                        $qty = $cartObj[$request->pid]["quantity"] + $request->quantity;

                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product" => $product,
                            "quantity" => $qty,
                            "amount" => $product["price"] * $qty,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    } else {

                        $cartObj[$request->pid] = [
                            "member_id" => "NA",
                            "product" => $product,
                            "quantity" => $request->quantity,
                            "amount" => $product["price"] * $request->quantity,
                            "date_added" => date("d/m/y"),
                            "card_date" => $request->date
                        ];
                    }
                }


                session([
                    "cart" => $cartObj,
                    "cart_count" => count($cartObj)
                ]);

                return "added-to-cart";
            } else {

                return "out-of-stock";
            }
        }
    }

    function cart_page()
    {

        $cart_items = session("cart");

        if (empty($cart_items) || (!isset($cart_items))) {
            return redirect(url("shop"));
        } else {

            if (session("cart")) {

                $cartItems = session("cart");
            } else {
                $cartItems = [];
            }
            $discountSet = session("discount");
            if (isset($discountSet)) {
                $discount = session("discount");
            } else {
                $discount = 0.00;
                session(["discount" => 0.00]);
            }


            $this->page_loader("list_of_cart", [
                "title" => "Cart ",
                "cart_items" => $cartItems,
                "discount" => $discount
            ]);
        }
    }

    function increase_cart_item(Request $request)
    {



        $product = Product::find($request->pid);


        $cartItems = session("cart");

        $finalQty = $cartItems[$request->pid]["quantity"] = $cartItems[$request->pid]["quantity"] + 1;

        if ($product["instock"] >= $finalQty) {

            if (session(["cart" => $cartItems])) {

                return 'increased-from-cart';
            } else {

                return 'not-increased-from-cart';
            }
        }
    }

    function decrease_cart_item(Request $request)
    {



        $product = Product::find($request->pid);


        $cartItems = session("cart");

        $finalQty = $cartItems[$request->pid]["quantity"] = $cartItems[$request->pid]["quantity"] - 1;

        if ($product["instock"] >= $finalQty) {

            if (session(["cart" => $cartItems])) {
                return 'decreased-from-cart';
            } else {

                return 'not-decreased-from-cart';
            }
        }
    }


    function delete_cart_item(Request $request)
    {

        $pid = $request->pid;

        $cartItems = session("cart");

        unset($cartItems[$pid]);

        $cartCount = session("cart_count");

        $newCartCount = $cartCount-1; 

        if (session(["cart" => $cartItems,"cart_count"=>$newCartCount])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function create_new_address(Request $request){

        $memberAddressObj = [

            "member_id" => session("member_id"),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "zip" => $request->zip,
            "country" => "India",
            "default" => "yes",
            "tag" => $request->address_tag

        ];

        MemberAddress::where('member_id', session("member_id"))
        ->update(['default' => "no"]);

        if(MemberAddress::create($memberAddressObj)){
            
            $this->checkout("Address added to your account");
            
        }else{

            $this->checkout("Address added to your account");
            
        }

    }

    function checkout($successMessage='',$failureMessage='')
    {

        
        $cart_items = session("cart");

        if (empty($cart_items) || (!isset($cart_items))) {

            return redirect(url("shop"));
        } else {


            if (session("subtotal") < 499) {
                $shipping = 100;
            } else {
                $shipping = 0;
            }

            $payable = session("subtotal") - session('discount') + $shipping;

            $payable = 1.00;

            session(["payable" => $payable]);

            $api = new Api(getenv("RAZOR_KEY"), getenv("RAZOR_SECRET"));

            $order = $api->order->create(array('receipt' => uniqid(), 'amount' => $payable * 100, 'currency' => 'INR'));

            $memberData = Member::where("id",session("member_id"))->with("addresses")->first();

            if(!empty($memberData["addresses"])){

                session([
                    "order_address" => $memberData["addresses"]
                ]);

            }else{

                if($memberData["address"]){
                    session([
                        "order_address" => [
                            "tag" => "default",
                            "address" => $memberData["address"]
                        ]
                    ]);
                }
    

            }


            $this->page_loader("checkout", [
                "title" => "Checkout ",
                "success" => $successMessage,
                "failure" => $failureMessage,
                "member" => Member::find(session("member_id")),
                "cart_items" => session("cart"),
                "payable" => $payable,
                "order" => $order,
                "member" => $memberData
            ]);
        }


    }

    function payment()
    {
        $this->page_loader("payment", [
            "title" => "Payment "
        ]);
    }

    function recalculate_subtotal()
    {
        $subtotal = 0.00;


        foreach (session("cart") as $cartItem) {

            $subtotal += $cartItem["amount"];
        }
        return $subtotal;
    }

    function fetch_current_cart_count(){
        return session("cart_count");
    }
}
