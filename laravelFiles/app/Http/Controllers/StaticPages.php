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
    function career()
    {
        $this->page_loader("career", [
            "title" => "Career | Mintage World"
        ]);
    }
    function sitemap()
    {
        $this->page_loader("sitemap", [
            "title" => "Sitemap | Mintage World"
        ]);
    }
    function story()
    {
        $this->page_loader("story", [
            "title" => "Story | Mintage World"
        ]);
    }
    function photopro()
    {
        $this->page_loader("photopro", [
            "title" => "Photo Pro | Mintage World"
        ]);
    }
    function videos()
    {
        $this->page_loader("videos", [
            "title" => "videos | Mintage World"
        ]);
    }
    function courtesy()
    {
        $this->page_loader("courtesy", [
            "title" => "courtesy | Mintage World"
        ]);
    }
    function contact_us()
    {
        $this->page_loader("contact_us", [
            "title" => "Contact Us | Mintage World"
        ]);
    }
    function login()
    {
        $this->page_loader("login", [
            "title" => "Login | Mintage World"
        ]);
    }
    function member()
    {
        $this->page_loader("member", [
            "title" => "Member | Mintage World"
        ]);
    }
    function forgotpassword()
    {
        $this->page_loader("forgotpassword", [
            "title" => "Forgot Password | Mintage World"
        ]);
    }
    function upgrademembership()
    {
        $this->page_loader("upgrademembership", [
            "title" => "Upgrade Membership | Mintage World"
        ]);
    }
    function event()
    {
        $this->page_loader("event", [
            "title" => "event | Mintage World"
        ]);
    }
    function media()
    {
        $this->page_loader("media", [
            "title" => "News | Mintage World"
        ]);
    }
    function media_coverage()
    {
        $this->page_loader("media_coverage", [
            "title" => "Media Coverage | Mintage World"
        ]);
    }
    function dashboard()
    {
        $this->page_loader("dashboard", [
            "title" => "Dashboard | Mintage World"
        ]);
    }
    function change_password()
    {
        $this->page_loader("change_password", [
            "title" => "Change Password | Mintage World"
        ]);
    }
    function myorders()
    {
        $this->page_loader("myorders", [
            "title" => "Media Coverage | Mintage World"
        ]);
    }
    function knowledge_base()
    {
        $this->page_loader("knowledge_base", [
            "title" => "kKowledge Base | Mintage World"
        ]);
    }

    function know_your_coins()
    {
        $this->page_loader("know_your_coins", [
            "title" => "Know Your Coins | Mintage World"
        ]);
    }

    function governors_india()
    {
        $this->page_loader("governors_india", [
            "title" => "Governors Of Reserve Bank of India | Mintage World"
        ]);
    }

    function signatory_finance_secretary()
    {
        $this->page_loader("signatory_finance_secretary", [
            "title" => "Signatory Finance Secretary | Mintage World"
        ]);
    }

    function note_numbering_system()
    {
        $this->page_loader("note_numbering_system", [
            "title" => "Note Numbering System | Mintage World"
        ]);
    }

    function security_features_on_current_banknotes()
    {
        $this->page_loader("security_features_on_current_banknotes", [
            "title" => "Security Features On Current Banknotes | Mintage World"
        ]);
    }
    function security_features_on_demonetized_banknotes()
    {
        $this->page_loader("security_features_on_demonetized_banknotes", [
            "title" => "Security Features On Demonetized Banknotes | Mintage World"
        ]);
    }
    function know_your_stamps()
    {
        $this->page_loader("know_your_stamps", [
            "title" => "Know Your Stamps | Mintage World"
        ]);
    }
}
