<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageLoader extends Controller
{

    private function page_loader($viewName, $data)
    {

        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function admin_page_loader($viewName, $data)
    {
        echo view("components.admin_header", $data);
        echo view("admin_pages." . $viewName, $data);
        echo view("components.admin_footer", $data);
    }

    function home()
    {


        $this->page_loader("home", [
            "title" => "Online Museum of Coins, Stamps and Notes"
        ]);
    }

    function admin_login()
    {
        $this->page_loader("admin_login", [
            "title" => "Admin Login"
        ]);
    }

    function dashboard()
    {
        $this->admin_page_loader("dashboard", [
            "title" => "Dashboard"
        ]);
    }

    function manage_products(){

        $this->admin_page_loader("manage_products",[
            "title" => "Manage Products"
        ]);

    }

}
