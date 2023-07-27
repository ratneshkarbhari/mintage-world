<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StaticPages extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }
    function about_us()
    {
        $this->page_loader("about_us", [
            "title" => "About Us | Mintage World"
        ]);
    }
    function disclaimer()
    {
        $this->page_loader("disclaimer", [
            "title" => "Disclaimer | Mintage World"
        ]);
    }
    function privacy_policy()
    {
        $this->page_loader("privacy_policy", [
            "title" => "Privacy Policy | Mintage World"
        ]);
    }
    function terms_of_use()
    {
        $this->page_loader("terms_of_use", [
            "title" => "Terms of Use | Mintage World"
        ]);
    }
    function return_policy()
    {
        $this->page_loader("return_policy", [
            "title" => "Return Policy | Mintage World"
        ]);
    }
    function contact_us()
    {
        $this->page_loader("contact_us", [
            "title" => "Contact Us | Mintage World"
        ]);
    }
    function sitemap()
    {
        $this->page_loader("sitemap", [
            "title" => "Sitemap | Mintage World"
        ]);
    }
}
