<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Shopping extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }
    function shop()
    {
        $this->page_loader("shop", [
            "title" => "Shopping | Buy Coins, Banknotes, Stamp, Accessories and Greeting Cards Online | Mintage World"
        ]);
    }
    function shop_list()
    {
        $this->page_loader("shop_list", [
            "title" => "Buy Amazing Old World Currency Notes Online | Mintage World"
        ]);
    }
}
