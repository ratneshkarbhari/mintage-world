<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EmailTests extends Controller
{
    
    function order_placed() {


        
        // $emailBody =  view("emails.order_placed",[
        //     "full_name" => "Ratnesh Karbharix",
        //     "orderid" => "ORD-123",
        //     "date" => "February 16 2023",
        //     "payment_status" => "Declined",
        //     "products" => [
        //         [
        //            "title" => "Sultans of Kashmir Coin Anonymous Kaserah",
        //            "price" => 500,
        //            "quantity" => 2 
        //         ],
        //         [
        //             "title" => "Sultans of Kashmir Coin Anonymous Kaserah 2",
        //             "price" => 123,
        //             "quantity" => 3 
        //         ],
        //     ],
        //     "shipping" => 500,
        //     "discount" => 159,
        //     "mobile_number" => "8652282758"

        // ]);


        $emailBody =(string)View::make('emails.order_placed',[
            "full_name" => "Ratnesh Karbharix",
            "orderid" => "ORD-123",
            "date" => "February 16 2023",
            "payment_status" => "Successful",
            "status" => "Dispatched",
            "courier_name" => "Ekart Logistics",
            "tracking_number" => "SRTP4401822720",
            "courier_date" => date("d-m-Y",strtotime("2024-02-22")),  
            "shipping_address" => "<p>Shipping Address</p>",
            "payment_address" => "<p>Payment Address</p>",
            "products" => [
                [
                   "title" => "Sultans of Kashmir Coin Anonymous Kaserah",
                   "price" => 500,
                   "quantity" => 2 
                ],
                [
                    "title" => "Sultans of Kashmir Coin Anonymous Kaserah 2",
                    "price" => 123,
                    "quantity" => 3 
                ],
            ],
            "shipping" => 500,
            "discount" => 159,
            "mobile_number" => "8652282758"

        ]);

        echo $emailBody;

        exit;

        $utils = new Utils();

        $res = $utils->send_email(session("email"),session("first_name"), "Your Order from Mintage World Shopping", $emailBody);

        dd($res);

    }

}
