<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Order;
use App\Models\Member;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
                "shpcity" => $billingAddressData["shipping_city"],
                "State" => $shippingAddressData["shipping_state"],
                "shpstate" => $billingAddressData["shipping_state"],
                "PinCode" => $shippingAddressData["billing_pincode"],
                "shppincode" => $billingAddressData["shipping_pincode"],
                "Phone" => $shippingAddressData["shipping_mobile_number"],
                "billing_phone" => $billingAddressData["shipping_mobile_number"],
                "Location" => 113,
                "shplocation" => 113,
                "shpcountry_name" => "India",
                "ordered" => date("Y-m-d H:i:s"),
                "confirmed" => 0,
                "status" => $status,
                "subtotal" => session("subtotal")-session("discount"),
                "shipping" => $shipping,
                "items" => count(session("cart")),
                "orderid" => "ORD-".$orderIdDigits,
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

                session(["current_order_id"=>$orderId]);
            
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





            return $orderId;


        }

        
        

    }

    function generate_email_body($viewName,$bodyData){
        return (string)View::make("emails.".$viewName,$bodyData);
    }


    function place_order(Request $request){

        $cartActions = new CartActions();

        $cartActions->clear_cart();
        $order = Order::find($request->orderid);

        if($order->update([
            "status" => $request->status,
            "payment_status" => $request->payment_status
        ])){

            
            $orderProducts  = OrderProduct::where("shoppingid",$order["id"])->with("products")->get();
            $orderProductsForEmail = [];
            foreach($orderProducts as $orderProduct){
                $orderProductsForEmail[] = [
                    "title" => $orderProduct["productname"],
                    "price" => $orderProduct["price"],
                    "quantity" => $orderProduct["quantity"]
                ];
            }
            $emailBody = $this->generate_email_body("order_placed",[
                "full_name" => $order["Shipping_Name1"],
                "orderid" => $order["orderid"],
                "date" =>  date('l d F Y'),
                "status" => $order['status'],
                "payment_status" => $request->payment_status,
                "products" => $orderProductsForEmail,
                "shipping" => $order["shipping"],
                "discount" => 0,
                "courier_name" => $order['couriers'],
                "tracking_number" => $order['tracking_number'],
                "courier_date" => date("d-m-Y"),  
                "shipping_address" => $order['Shipping_Address1'],
                "payment_address" => $order['payment_address']
            ]);

            $utils = new Utils();



            if($res = $utils->send_email(session("email"),session("first_name"), "Your Order from Mintage World Shopping", $emailBody)){

                echo "placed";                
            }else{
                echo "not placed";
            }


        
        }



    }
    
    function update_payment_status(Request $request) {
        
        $orderid = $request->orderid;
        $paymentStatus = $request->payment_status;

        if($orderData = Order::where("orderid",$orderid)->first()){

            $updated = $orderData->update([
                "payment_status" => $paymentStatus
            ]);

            if($updated){
                return [
                    "result" => "success",
                    "message" => "Payment status updated"
                ];
            }

        }else{
            return [
                "result" => "failure",
                "message" => "Order not present"
            ];
        }

    }

    function get_all() {
        
        $allOrders = Order::orderBy("id","asc")->with("member")->with("order_products")->get();

        return response()->json([
            "data" => $allOrders
        ]);

    }
   
    function update_order_status(Request $request) {
       
        $orderModel = new Order();

        $order = $orderModel->where("orderid",$request->orderid)->with("order_products")->with("member")->first();


        $orderProducts  = OrderProduct::where("shoppingid",$order["id"])->with("products")->get();


        $orderProductsForEmail = [];
        foreach($orderProducts as $orderProduct){
            $orderProductsForEmail[] = [
                "title" => $orderProduct["productname"],
                "price" => $orderProduct["price"],
                "quantity" => $orderProduct["quantity"]
            ];
        }


        if($order->update([
            "status" => $request->status,
            "couriers" => $request->courier_name,
            "tracking_number" => $request->courier_number,
            "courier_date" => $request->courier_date,
        ])){

            $emailBody = $this->generate_email_body("order_placed",[
                "full_name" => $order["Shipping_Name1"],
                "orderid" => $order["orderid"],
                "date" =>  date('l d F Y'),
                "status" => $order['status'],
                "payment_status" => $request->payment_status,
                "products" => $orderProductsForEmail,
                "shipping" => $order["shipping"],
                "discount" => 0,
                "courier_name" => $order['couriers'],
                "tracking_number" => $order['tracking_number'],
                "courier_date" => date("d-m-Y"),  
                "shipping_address" => $order['Shipping_Address1'],
                "payment_address" => $order['payment_address']
            ]);

            $utils = new Utils();



            if($res = $utils->send_email($order['member']['email'],session("first_name"), "Mintage World - Order ".$request->status, $emailBody)){

                return "order-updated";
            }else{
                return "order-not-updated";
            }
            

        }else{
            return "order-update-failed";
        }
        
    }
    
    
}
