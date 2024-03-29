<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Event;
use App\Models\Media;
use App\Models\Order;
use App\Models\Story;
use App\Models\Video;
use Razorpay\Api\Api;
use App\Models\Member;
use App\Models\MediaCoverage;
use App\Models\MemberAddress;

class StaticPages extends Controller
{
    private function page_loader($viewName, $data)
    {

        if (!isset($data['description'])) {
            $data['description'] = "";
        }

        if (!isset($data['keywords'])) {
            $data['keywords'] = "";
        }

        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }
    function about_us()
    {
        $this->page_loader("about_us", [
            "title" => "About Us | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function disclaimer()
    {
        $this->page_loader("disclaimer", [
            "title" => "Disclaimer | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function privacy_policy()
    {
        $this->page_loader("privacy_policy", [
            "title" => "Privacy Policy | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function terms_of_use()
    {
        $this->page_loader("terms_of_use", [
            "title" => "Terms of Use | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function return_policy()
    {
        $this->page_loader("return_policy", [
            "title" => "Return Policy | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function career()
    {
        $this->page_loader("career", [
            "title" => "Career | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function sitemap()
    {
        $this->page_loader("sitemap", [
            "title" => "Sitemap | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function story()
    {

        $storyModel = new Story();

        $stories = $storyModel->orderBy("id", "desc")->paginate(20);

        $this->page_loader("story", [
            "title" => "Story of the Week | Mintage World ",
            "description" => "",
            "keywords" => "",
            "stories" => $stories
        ]);
    }
    function story_detail($id)
    {

        $storyModel = new Story();

        $slugParts = explode("-", $id);

        $id = $slugParts[0];

        $focus_story = $storyModel->find($id);


        $latestTenStories = $storyModel->orderBy("id", "desc")->limit(10, 0)->get();

        $this->page_loader("story_detail", [
            "title" => $focus_story['title'],
            "description" => "",
            "keywords" => "",
            "focus_story" => $focus_story,
            "ten_stories" => $latestTenStories
        ]);
    }
    function photopro()
    {
        $this->page_loader("photopro", [
            "title" => "Photo Pro | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function videos()
    {
        $videoModel = new Video();
        $this->page_loader("videos", [
            "title" => "Event Videos | Mintage World",
            "description" => "",
            "keywords" => "",
            "videos" => $videoModel->orderBy("id", 'desc')->get()
        ]);
    }
    function videos_detail($videoSlug)
    {
        $videoSlugParts = explode("-", $videoSlug);
        $mainVideoData = Video::find($videoSlugParts[0]);
        $latestFiveVideos = Video::orderBy("id", "desc")->limit(5, 0)->get();
        $this->page_loader("videos_detail", [
            "title" => $mainVideoData['title'] . " | Mintage World",
            "description" => "",
            "keywords" => "",
            "main_video" => $mainVideoData,
            "latest_five_videos" => $latestFiveVideos
        ]);
    }
    function courtesy()
    {
        $this->page_loader("courtesy", [
            "title" => "courtesy | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function contact_us()
    {
        $this->page_loader("contact_us", [
            "title" => "Contact Us | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function login($success = "")
    {

        if (session("member_id")) {
            return redirect(url("member/dashboard"));
        }

        $this->page_loader("login", [
            "title" => "Login | Mintage World",
            "description" => "",
            "keywords" => "",
            "is_login" => TRUE,
            "success" => $success
        ]);
    }
    function member($registrationErrorMessage = "")
    {
        $this->page_loader("member", [
            "title" => "New Member Registraion | Mintage World",
            "description" => "",
            "keywords" => "",
            "registrationErrorMessage" => $registrationErrorMessage
        ]);
    }

    function pwd_reset_code_verify($error = "")
    {

        $this->page_loader("pwd_reset_code_verify", [
            "title" => "Password Reset Code verify | Mintage World",
            "description" => "",
            "keywords" => "",
            "error" => $error
        ]);
    }

    function forgotpassword($error = '')
    {
        $memberId = session("member_id");
        if (isset($memberId)) {
            return redirect()->to(url('/'));
        }
        $this->page_loader("forgotpassword", [
            "title" => "Forgot Password | Mintage World",
            "description" => "",
            "keywords" => "",
            "error" => $error
        ]);
    }
    function membership_detail()
    {
        $this->page_loader("membership_detail", [
            "title" => "Membership Detail | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function manage_address()
    {

        $memberAddresses = MemberAddress::where("member_id", session("member_id"))->get();

        $this->page_loader("manage_address", [
            "title" => "Manage Address | Mintage World",
            "description" => "",
            "keywords" => "",
            "member_addresses" => $memberAddresses
        ]);
    }
    function upgrademembership()
    {

        $api = new Api(getenv("RAZOR_KEY"), getenv("RAZOR_SECRET"));

        $order = $api->order->create(array('receipt' => uniqid(), 'amount' => 100, 'currency' => 'INR'));


        $this->page_loader("upgrademembership", [
            "title" => "Upgrade Membership | Mintage World",
            "description" => "",
            "keywords" => "",
            "order" => $order
        ]);
    }
    function event()
    {

        $eventModel = new Event();

        $events = $eventModel->where("status", '1')->orderBy("id", "desc")->paginate(12);




        $total = $events->total();
        $currentPage = $events->currentPage();
        $perPage = $events->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";




        $this->page_loader("event", [
            "title" => "Events | Mintage World",
            "description" => "",
            "keywords" => "",
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
            "description" => "",
            "keywords" => "",
            "media_entries" => $entries,
            "pagination_info_string" => $paginationInfoString
        ]);
    }

    function media_detail($slug)
    {

        $slugParts = explode("-", $slug);

        $mediaEntry = Media::find($slugParts[0]);

        $mediaModel = new Media();

        $otherMediaEntries = $mediaModel->where("id", '!=', $mediaEntry["id"])->orderBy("id", "desc")->limit(5, 0)->get();

        $this->page_loader("media_detail", [
            "title" => $mediaEntry['title'],
            "description" => "",
            "keywords" => "",
            "media_entry" => $mediaEntry,
            "other_media_entries" => $otherMediaEntries
        ]);
    }
    function media_coverage()
    {

        $mediaCoverageModel = new MediaCoverage();

        $media_coverage_items = $mediaCoverageModel->where("active", 1)->with("pdf")->orderBy("id", "desc")->paginate(12);


        $total = $media_coverage_items->total();
        $currentPage = $media_coverage_items->currentPage();
        $perPage = $media_coverage_items->perPage();
        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);
        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        $this->page_loader("media_coverage", [
            "title" => "Media Coverage | Mintage World",
            "description" => "",
            "keywords" => "",
            "media_coverage_items" => $media_coverage_items,
            "pagination_info_string" => $paginationInfoString
        ]);
    }
    function dashboard($status = "")
    {
        $memberId = session("member_id");
        if (!isset($memberId)) {
            return redirect(url("application/login"));
        }
        $this->page_loader("dashboard", [
            "title" => "Dashboard | Mintage World",
            "description" => "",
            "keywords" => "",
            "user" => Member::find(session("member_id")),
            "status" => $status
        ]);
    }

    function payment_successful()
    {
        return view("payment_successful");
    }

    function change_password($errorMessage = "", $successMessage = "")
    {
        $this->page_loader("change_password", [
            "title" => "Change Password | Mintage World",
            "description" => "",
            "keywords" => "",
            "errorMessage" => $errorMessage,
            "successMessage" => $successMessage
        ]);
    }
    function myorders()
    {

        $orderModel = new Order();

        $orders = $orderModel->where("payment_status", "Success")->where("member_id", session("member_id"))->with("order_products")->orderBy("id", "desc")->get();


        $this->page_loader("myorders", [
            "title" => "My Orders | Mintage World",
            "description" => "",
            "keywords" => "",
            "orders" => $orders
        ]);
    }
    function knowledge_base()
    {
        $this->page_loader("knowledge_base", [
            "title" => "Kowledge Base | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }

    function know_your_coins()
    {
        $this->page_loader("know_your_coins", [
            "title" => "Know Your Coins | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }

    function governors_india()
    {
        $this->page_loader("governors_india", [
            "title" => "Governors Of Reserve Bank of India | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }

    function signatory_finance_secretary()
    {
        $this->page_loader("signatory_finance_secretary", [
            "title" => "Signatory Finance Secretary | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function knowledge_base_note_listing($id)
    {

        
        switch ($id) {
            case 1:
                $governerName = "C. D Deshmukh";
                break;
            case 2:
                $governerName = "B. Rama Rau";
                break;
            case 3:
                $governerName = "K. G. Ambegaonkar";
                break;
            case 4:
                $governerName = "H. V. R. Iyengar";
                break;
            case 5:
                $governerName = "P. C. Bhattacharya";
                break;
            case 6:
                $governerName = "L. K. JHA";
                break;
            case 7:
                $governerName = "B. N. Adarkar";
                break;
            case 8:
                $governerName = "S. Jagannathan";
                break;
            case 9:
                $governerName = "N. C. Sengupta";
                break;
            case 10:
                $governerName = "K.R Puri";
                break;
            case 11:
                $governerName = "M. Narasimham";
                break;
            case 12:
                $governerName = "I. G. Patel";
                break;
            case 13:
                $governerName = "Manmohan Singh";
                break;
            case 14:
                $governerName = "Amitabh Ghosh";
                break;
            case 15:
                $governerName = "R. N. Malhotra";
                break;
            case 16:
                $governerName = "S. Venkitaramanan";
                break;
            case 17:
                $governerName = "C. Rangarajan";
                break;
            case 18:
                $governerName = "Bimal Jalan";
                break;
            case 19:
                $governerName = "Y. V. Reddy";
                break;
            case 20:
                $governerName = "D Subbarao";
                break;
            case 21:
                $governerName = "Raghuram Rajan";
                break;
            case 22:
                $governerName = "K R K Menon";
                break;
            case 23:
                $governerName = "H. M. Patel";
                break;
            case 24:
                $governerName = "A.K. Roy";
                break;
            case 25:
                $governerName = "S.Bhoothlingam";
                break;
            case 26:
                $governerName = "M. G. Kaul";
                break;
            case 27:
                $governerName = "Pratap Kisan Kaul";
                break;
            case 28:
                $governerName = "Gopi K. Arora";
                break;
            case 29:
                $governerName = "Montek Singh Ahluwalia";
                break;
            case 30:
                $governerName = "S. P. Shukla";
                break;
        }

        $notesForGoverner = Note::where("signatory",trim($governerName))->with("denomination")->get();

        $this->page_loader("knowledge_base_note_listing", [
            "title" => "Notes | Mintage World",
            "description" => "",
            "keywords" => "",
            "notes" => $notesForGoverner,
            "governor" => $governerName
        ]);
    }

    function note_numbering_system()
    {
        $this->page_loader("note_numbering_system", [
            "title" => "Note Numbering System | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }


    function security_features_on_current_banknotes()
    {
        $this->page_loader("security_features_on_current_banknotes", [
            "title" => "Security Features on Current Bank Notes | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function security_features_on_demonetized_banknotes()
    {
        $this->page_loader("security_features_on_demonetized_banknotes", [
            "title" => "Security Features on Demonetized  Bank Notes | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }
    function know_your_stamps()
    {
        $this->page_loader("know_your_stamps", [
            "title" => "Know your Stamps | Mintage World",
            "description" => "",
            "keywords" => ""
        ]);
    }

    function verify_email($verifCode = "", $registrationErrorMessage = "")
    {

        $this->page_loader("verify_email", [
            "title" => "Verify Email | Mintage World",
            "description" => "",
            "keywords" => "",
            "verif_code" => $verifCode,
            "registrationErrorMessage" => $registrationErrorMessage
        ]);
    }

    function verify_email_page()
    {


        $this->page_loader("verify_email", [
            "title" => "Verify Email | Mintage World",
            "description" => "",
            "keywords" => "",
            "registrationErrorMessage" => "",
            "verif_code" => ""
        ]);
    }
}
