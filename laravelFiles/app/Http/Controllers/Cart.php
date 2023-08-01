<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Cart extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }
    function list_of_cart()
    {
        $this->page_loader("list-of-cart", [
            "title" => "Cart List | Mintage World"
        ]);
    }
    function checkout()
    {
        $this->page_loader("checkout", [
            "title" => "Checkout | Mintage World"
        ]);
    }
    function payment()
    {
        $this->page_loader("payment", [
            "title" => "Payment | Mintage World"
        ]);
    }
}
