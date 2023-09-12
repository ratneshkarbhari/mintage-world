<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Event;
use App\Models\Media;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Razorpay\Api\Api;


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
            "title" => "About Us | Mintage World",
            ""
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
    function story_detail()
    {
        $this->page_loader("story_detail", [
            "title" => "Story Detail | Mintage World"
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
    function videos_detail()
    {
        $this->page_loader("videos_detail", [
            "title" => "video Title | Mintage World"
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

        if (session("type")) {
            return redirect(url("member/dashboard"));
        }

        $this->page_loader("login", [
            "title" => "Login | Mintage World",
            "is_login" => TRUE
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
    function membership_detail()
    {
        $this->page_loader("membership_detail", [
            "title" => "Membership Detail | Mintage World"
        ]);
    }
    function upgrademembership()
    {

        $api = new Api(getenv("RAZOR_KEY"), getenv("RAZOR_SECRET"));

        $order = $api->order->create(array('receipt' => uniqid(), 'amount' => 100, 'currency' => 'INR'));


        $this->page_loader("upgrademembership", [
            "title" => "Upgrade Membership | Mintage World",
            "order" => $order
        ]);
    }
    function event()
    {

        $eventModel = new Event();

        $events = $eventModel->where("status", 1)->orderBy("id", "desc")->paginate(16);


        $total = $events->total();
        $currentPage = $events->currentPage();
        $perPage = $events->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";




        $this->page_loader("event", [
            "title" => "Events | Mintage World",
            "events" => $events,
            "pagination_info_string" => $paginationInfoString
        ]);
    }
    function media_list()
    {

        $entries = Media::where("status", "1")->orderBy("id", "desc")->paginate(12);


        $total = $entries->total();
        $currentPage = $entries->currentPage();
        $perPage = $entries->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";



        $this->page_loader("media", [
            "title" => "News | Mintage World",
            "media_entries" => $entries,
            "pagination_info_string" => $paginationInfoString
        ]);
    }

    function media_detail($slug)
    {

        $slugParts = explode("-",$slug);

        $mediaEntry = Media::find($slugParts[0]);

        $mediaModel = new Media();

        $otherMediaEntries = $mediaModel->where("id",'!=',$mediaEntry["id"])->orderBy("id","desc")->limit(5,0)->get();

        $this->page_loader("media_detail", [
            "title" => "News | Mintage World",
            "media_entry" => $mediaEntry,
            "other_media_entries" => $otherMediaEntries
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
            "title" => "Dashboard | Mintage World",
            "user" => Member::find(session("member_id"))
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

        $orderModel = new Order();

        $orders = $orderModel->where("member_id", session("member_id"))->with("order_products")->orderBy("id", "desc")->get();


        $this->page_loader("myorders", [
            "title" => "My Orders | Mintage World",
            "orders" => $orders
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
