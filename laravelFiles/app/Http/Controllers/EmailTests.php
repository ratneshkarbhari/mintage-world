<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class EmailTests extends Controller
{
    
    function order_placed() {


        
        return view("emails.order_placed",[
            "full_name" => "Ratnesh Karbharix",
            "orderid" => "ORD-123",
            "date" => "February 16 2023",
            "payment_status" => "Declined",
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

    }

}
