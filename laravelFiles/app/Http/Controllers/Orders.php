<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class Orders extends Controller
{

    function create_exe(Request $request){

        $rzpOrderId = $request->rzp_order_id;

        $cart_items = session("cart");

        $memberId = session("member_id");

        $memberData = Member::find($memberId);

        if(session("subtotal")<500){
            $shipping = 100;
        }else{
            $shipping = 0;
        }


        $orderModel = new Order();

        
        $latestOrder = $orderModel->orderBy("id","desc")->first();

        $orderId = $latestOrder["orderid"];

        $orderIdDigits = explode("-",$orderId)[1];

        $orderIdDigits=$orderIdDigits+1;


        $orderId = $orderModel->insertGetId([

            "totalamt" => session("payable"),
            "member_id" => session("member_id"),
            "Shipping_Name1" => session("first_name")." ".session("last_name"),
            "billing_name" => session("first_name")." ".session("last_name"),
            "Shipping_Address1" => $memberData["address"],
            "payment_address" => $memberData["address"],
            "City" => $memberData["city"],
            "shpcity" => $memberData["city"],
            "State" => $memberData["state_id"],
            "shpstate" => $memberData["state_id"],
            "PinCode" => $memberData["pincode"],
            "shppincode" => $memberData["pincode"],
            "Phone" => $memberData["mobile"],
            "billing_phone" => $memberData["mobile"],
            "Location" => "India",
            "shplocation" => "India",
            "shpcountry_name" => "India",
            "ordered" => date("Y-m-d H:i:s"),
            "confirmed" => 0,
            "status" => "Not Confirmed",
            "subtotal" => session("subtotal")-session("discount"),
            "shipping" => $shipping,
            "items" => count(session("cart")),
            "orderid" => "ORDER-".$orderIdDigits,
            "payment_status" => "Success",
            "payment_note" => NULL,
            "dispatch" => NULL,
            "paymentmode" => "RAZORPAY",
            "discountcoupounid" => session("code"),
            "payableamount" => session("payable"),
            "order_ip" => $_SERVER["REMOTE_ADDR"],
            "order_agent" => $_SERVER['HTTP_USER_AGENT'],
            "modified_date" => date("Y-m-d H:i:s"),
            "mode_of_purchase" => "Web",
            "app_paymentid" => NULL,
            "couriers" => "",
            "tracking_number" => "",
            "courier_date" => "",
            "gw_tx_id" => $rzpOrderId
        ]);


        if ($orderId) {
        
            foreach ($cart_items as $cart_item) {
            
                $orderProductsModel = new OrderProduct();

    
                $orderProductsModel->insert([
    
                    "productid" => $cart_item["product"]["id"],
                    "productname" => $cart_item["product"]["name1"],
                    "quantity" => $cart_item["quantity"],
                    "price" => $cart_item["product"]["price"],
                    "shoppingid" => $orderId,
                    "date" => date("d-m-Y")
    
                ]);
                
            }

        }

        return "order-created";

    }
    
}
