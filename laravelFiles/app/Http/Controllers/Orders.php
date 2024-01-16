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

        $status = $request->status;

        $memberId = session("member_id");

        $orderModel = new Order();


        if(!$orderModel->where("gw_tx_id",$rzpOrderId)->first()){

            $shippingAddressData = ["shipping_address" => $request->shipping_address,
                "shipping_city" => stripslashes($request->shipping_city),
                "shipping_state" => stripslashes($request->shipping_state),
                "shipping_country" => stripslashes($request->shipping_country),
                "shipping_mobile_number" => stripslashes($request->shipping_mobile_number),
                "shipping_pincode" => stripslashes($request->shipping_pincode)
            ];

            $billingAddressData = ["billing_address" => stripslashes($request->billing_address),
                "billing_city" => stripslashes($request->billing_city),
                "billing_state" => stripslashes($request->billing_state),
                "billing_country" => stripslashes($request->billing_country),
                "billing_mobile_number" => stripslashes($request->billing_mobile_number),
                "billing_pincode" => stripslashes($request->shipping_pincode)
            ];


            if(session("subtotal")<500){
                $shipping = 100;
            }else{
                $shipping = 0;
            }



            
            $latestOrder = $orderModel->orderBy("id","desc")->first();

            $orderId = $latestOrder["orderid"];


            $orderIdDigits = explode("-",$orderId)[1];

            $orderIdDigits=$orderIdDigits+1;


            $orderId = $orderModel->insertGetId([

                "totalamt" => session("payable"),
                "member_id" => session("member_id"),
                "Shipping_Name1" => session("first_name")." ".session("last_name"),
                "billing_name" => session("first_name")." ".session("last_name"),
                "Shipping_Address1" => $shippingAddressData["shipping_address"],
                "payment_address" => $billingAddressData["billing_address"],
                "City" => $shippingAddressData["shipping_city"],
                "shpcity" => $shippingAddressData["shipping_city"],
                "State" => $shippingAddressData["shipping_state"],
                "shpstate" => $shippingAddressData["shipping_state"],
                "PinCode" => $shippingAddressData["shipping_pincode"],
                "shppincode" => $shippingAddressData["shipping_pincode"],
                "Phone" => $shippingAddressData["shipping_mobile_number"],
                "billing_phone" => $shippingAddressData["shipping_mobile_number"],
                "Location" => 113,
                "shplocation" => 113,
                "shpcountry_name" => "India",
                "ordered" => date("Y-m-d H:i:s"),
                "confirmed" => 0,
                "status" => $status,
                "subtotal" => session("subtotal")-session("discount"),
                "shipping" => $shipping,
                "items" => count(session("cart")),
                "orderid" => "ORD9-".$orderIdDigits,
                "payment_status" => "Processing",
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
   
    function update_order_status(Request $request) {
       
        $orderModel = new Order();

        if($orderModel->where("orderid",$request->orderid)->update([
            "status" => $request->status,
            "couriers" => $request->courier_name,
            "tracking_number" => $request->courier_number,
            "courier_date" => $request->courier_date,
        ])){
            return "order-updated";
        }else{
            return "order-update-failed";
        }
        
    }
    
    function update(Request $request) {

        $gwTxId = $request->gw_tx_id;

        $paymentStatus = $request->payment_status;
        $status = $request->status;

        $orderModel = new Order();

        $order = $orderModel->where("gw_tx_id",$gwTxId)->first();

        if($order){

            if($order->update([
                "status" => $status,
                "payment_status" => $paymentStatus
            ])){
                return "updated";
            }

        }
        
    }

}
