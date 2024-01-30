<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use PDO;

class Orders extends Controller
{


    private function generate_email_body($orderData){

        $orderPlacedHtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <!--[if gte mso 9]>
            <xml>
                <o:OfficeDocumentSettings>
                <o:AllowPNG/>
                <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="format-detection" content="date=no" />
            <meta name="format-detection" content="address=no" />
            <meta name="format-detection" content="telephone=no" />
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz,wght@8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900&family=Salsa&display=swap" rel="stylesheet">
            <title>Your Order from Mintage World Shopping</title>
            <style type="text/css" media="screen"> 
                body { background-color:#f7f0ee; background-image:url(images/pattern.jpg); background-repeat:no-repeat repeat-y; background-position:center 0; padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f7f0ee; -webkit-text-size-adjust:none }
                a { color:#ef5751; text-decoration:none }
                p { padding:0 !important; margin:0 !important } 
                img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
                .text a { color: #ef5751 !important; text-decoration: underline !important; }
                table tr td {
                padding: 10px;
                line-height: 22px;
                font-size: 14px;
                font-family: Helvetica,Arial,sans-serif;
                }
                table tr td label {
                    font-weight: 600;
                } 
                /* Mobile styles */
            @media only screen and (max-width: 480px){
            
                .mobile-shell{width: 100% !important;margin-bottom:10px;max-width:100%}
                .mobile-shell tr td,.mobile-shell tr th {padding: 5px !important;line-height: 18px !important;font-size: 13px !important;}
                h2, h4,p {font-size: 14px !important;padding: 0px !important;margin: 0px 0px 5px 0px !important;}
                h3{font-size: 12px !important;}
                .mobile-shell tr td p {font-size: 12px !important;}
                }
            </style>
        </head>
        <body class="body" style="background-color:#F6F6F6; padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f7f0ee; -webkit-text-size-adjust:none">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #F6F6F6;font-family: Helvetica,Arial,sans-serif" align="center">
            <tbody>
                <tr>
                    <td style="text-align: center; font-family: Helvetica,Arial,sans-serif">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="margin: 0px auto;border: solid 1px #cfcfcf;font-family: Helvetica,Arial,sans-serif" bgcolor="#fff">
                        <tbody>
                            <tr>
                                <td> <a href="https://www.mintageworld.com/" target="_blank"><img src="https://www.mintageworld.com/public/img/zf2-logo.png" alt="" style="max-width: 100%;"></a>	 </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: solid 1px #cfcfcf;padding: 10px;line-height: 22px;font-size: 14px;">
                                <h2 style="text-align: center;	color: #e19726;	font-size: 22px;padding: 10px 0px;	margin: 0px; font-family: Helvetica,Arial,sans-serif">Booking Information</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;" >
                                <tr style="background-color: #742702; color: #FFF;">
                                    <th colspan="2"  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                    Order Details
                                    </th>
                                </tr>
                                <tr>
                                    <td  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px; vertical-align:top"><b>Order No : </b>  <label for="" id="lblInvoiceNo">ORD-12895</label><br>
                                    <b>Order Date : </b>  <label for="" id="lblOrderDate">11/08/2021</label>
                                    
                                    </td>
                                </tr>
                                </table>
                                <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;">
                                <tr style="background-color: #742702; color: #FFF;">
                                    <th colspan="2"  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                    Payment Details
                                    </th>
                                </tr>
                                <tr>
                                    <td  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;"><b>Payment Method : </b><br> <label for="">Net Banking (Razorpay)</label><br>
                                    <small><b>Transaction ID : </b> <label for="" id="lblTransactionID"> 1234567890</label></small>
                                    </td>
                                    
                                </tr>
                                </table>
                                </td>
                            </tr>
                            <tr>
                            <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" >
                            <tr style="background-color: #742702; color: #FFF;">
                                <th  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Dispatched Details</th> 
                            </tr>
                            <tr> 
                                <td  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                <b>Order Status : </b>  <label for="" id="lblOrderStatus">Dispatched</label><br>
                                    <label for="" id="lblDisDetail">SHREE MARUTI COURIER - 23658 - January 16 2024</label>
                                </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                            <tr>
                            <td style="text-align:left;padding: 10px;line-height: 22px;font-size: 14px;">
                                <table  width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;" >
                                <tr style="background-color: #742702; color: #FFF;">
                                    <th style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Payment Address</th> 
                                </tr>
                                <tr> 
                                    <td  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;"><label for="" id="lblShippingName">Priyanka Sawant</label><br>
                                    <label for="" id="lblShippingAddress">14-c Ultra Media Pvt. Ltd.</label><br>
                                    <label for="" id="lblShippingCity">Mumbai 400033</label><br>
                                    <label for="" id="lblShippingState">Maharashra</label><br>
                                    <label for="" id="lblShippingCountry">India</label>
                                    <label for="" id="lblMobileNo">India</label>
                                    </td>
                                </tr>
                                </table>
                                <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;" >
                                <tr style="background-color: #742702; color: #FFF;"> 
                                    <th  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Shipping Address</th>
                                </tr>
                                <tr> 
                                    <td  style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;"><label for="" id="lblShippingName">Priyanka Sawant</label><br>
                                    <label for="" id="lblShippingAddress">14-c Ultra Media Pvt. Ltd.</label><br>
                                    <label for="" id="lblShippingCity">Mumbai 400033</label><br>
                                    <label for="" id="lblShippingState">Maharashra</label><br>
                                    <label for="" id="lblShippingCountry">India</label>
                                    </td>
                                </tr>
                                </table>
                            </td>					 
                            </tr>
                            
                            <tr>
                                <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                <table width="100%" border="0px" cellspacing="0" cellpadding="0" class="mobile-shell" style="border-collapse: collapse;" >
                                    <tbody><tr style="background-color: #742702; color: #FFF;">
                                        <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px;">Product Name</th> 
                                        <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Qty.</th>
                                        <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Price</th>
                                        <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Total</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblProductName">Sultans of Kashmir Coin Anonymous Kaserah 
                                        <p style="font-size:12px; margin:0px;">(MICMKSU30503-2)</p></label></td>
                                        <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblQty">1</label></td>
                                        <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblPrice">500</label></td>
                                        <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblTotalPrice">500</label></td>
                                    </tr>
                                    <tr> 
                                        <td colspan="3"  style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Sub Total </td>
                                        <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblSubTotal">199</label></td>
                                    </tr>
                                    <tr>                                
                                        <td colspan="3"  style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Discount</td>
                                        <td  style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblDiscount">0</label></td>
                                    </tr>
                                    <tr>                                
                                        <td colspan="3"  style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Shipping</td>
                                        <td  style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblFreeShipping">0</label></td>
                                    </tr>
                                    
                                    <tr> 
                                        <td colspan="3" style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;" ><b>Total</b> <small>(Prices are inclusive of all taxes)</small></td>
                                        <td  style="text-align: right;padding: 10px;line-height: 22px;font-size: 16px; font-weight: 600;border:solid 1px #cfcfcf;"><b><label for="" id="lblGrossTotal">500</label></b></td>
                                    </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px;line-height: 22px;font-size: 14px;border-bottom: solid 1px #cfcfcf;text-align:center;font-family: Helvetica,Arial,sans-serif">				 
                                    <p style="font-size:13px;margin:0px; font-family: Helvetica,Arial,sans-serif">	
                                    You received this email because you are registered with Mintage World by <a href="http://www.mintageworld.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.mintageworld.com&amp;source=gmail&amp;ust=1705480800930000&amp;usg=AOvVaw0LiFf7pJGoEZi3HUZTtBZ4">www.mintageworld.com</a></p>
                                    Registered Office: 2-C, Thakar Indl. Estate N. M. Joshi Marg,<br>Lower Parel (E), Mumbai - 400 011.<br>
                                    Email: <a href="mailto:shop@mintageworld.com">shop@mintageworld.com</a>,<br> Contact: 022 - 40190400
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </body>
        </html>';


    }

    
    

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

            $memberData = Member::find(session("member_id"));


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



            $cartActions = new CartActions();

            $cartActions->clear_cart();

            return "order-created";


        }

        
        

    }


    function place_order(Request $request){

        $currentOrder = session("current_order_id");

        if($done = Order::find($currentOrder)->update([
            "status" => $request->status,
            "payment_status" => $request->payment_status
        ])){
            echo "updated";
        }



    }
    
    function update_payment_status(Request $request) {
        
        $orderid = $request->orderid;
        $paymentStatus = $request->payment_status;

        if($orderData = Order::where("orderid",$orderid)->first()){

            $updated = Order::where("orderid",$orderid)->update([
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
   
    function update_order_status(Request $request) {
       
        $orderModel = new Order();

        $order = $orderModel->where("orderid",$request->orderid)->with("order_products")->first();

        if($order->update([
            "status" => $request->status,
            "couriers" => $request->courier_name,
            "tracking_number" => $request->courier_number,
            "courier_date" => $request->courier_date,
        ])){

            $orderData = [

                "orderid" => $order['orderid'],
                "order_date" => $order["ordered"],
                "status" => "Not Confirmed",
                "payment_method" => "Razorpay",
                "gw_tx_id" => $order["gw_tx_id"],
                "dispatched_details" => "",
                "payment_address" => $order["payment_address"],
                "shipping_address" => $order['Shipping_Address1'],
                "order_products" => $order["order_products"]

            ];

            
            return "order-updated";

        }else{
            return "order-update-failed";
        }
        
    }
    
    
}
