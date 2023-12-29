<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


        if (!$featuredBooks = Cache::get("featured_books")) {

            $booksQuery = 'SELECT * FROM products WHERE status = "Active" AND instock > 0 AND category = 23 LIMIT 10';

            $featuredBooks = json_decode(json_encode(DB::select($booksQuery)), TRUE);


            Cache::set("featured_books", $featuredBooks);
        }


        if (!$featuredCoins = Cache::get("featured_coins")) {

            $coinsQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (18,24,25,26,27,28) LIMIT 10';

            $featuredCoins = json_decode(json_encode(DB::select($coinsQuery)), TRUE);

            Cache::set("featured_coins", $featuredCoins);
        }

        if (!$featuredNotes = Cache::get("featured_notes")) {

            $notesQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (35,36,37,38,39,40,41,42,43) LIMIT 10';

            $featuredNotes = json_decode(json_encode(DB::select($notesQuery)), TRUE);

            Cache::set("featured_notes", $featuredNotes);
        }


        if (!$featuredAccessories = Cache::get("featured_accessories")) {

            $accessoryQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (11,12,13,14) LIMIT 10';

            $featuredAccessories = json_decode(json_encode(DB::select($accessoryQuery)), TRUE);



            Cache::set("featured_accessories", $featuredAccessories);
        }


        // dd($featuredNotes);

        if (!$featuredStamps = Cache::get("featured_stamps")) {


            $stampQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (20,21,22,58,59,17,45,60) LIMIT 10';


            $featuredStamps = json_decode(json_encode(DB::select($stampQuery)), TRUE);

            Cache::get("featured_stamps", $featuredStamps);
        }

        $entries = Media::where("status", "1")->orderBy("id", "desc")->limit(7)->get();


        $this->page_loader("home", [
            "title" => "Online Museum of Coins, Stamps and Notes",
            "random_books" => $featuredBooks,
            "random_coins" => $featuredCoins,
            "random_notes" => $featuredNotes,
            "random_accessories" => $featuredAccessories,
            "random_stamps" => $featuredStamps,
            "news_items" => $entries
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

        $orderModel  = new Order();

        $productModel = new Product();

        $latestEightOrders = $orderModel->orderBy("id","desc")->limit(10,0)->get();

        $latestEightProducts = $productModel->orderBy("id","desc")->limit(10,0)->get();

        $this->admin_page_loader("dashboard", [
            "title" => "Dashboard",
            "latest_orders" => $latestEightOrders,
            "latest_products" => $latestEightProducts
        ]);
    }

    function manage_coins()
    {
        $this->admin_page_loader("manage_coins", [
            "title" => "Manage Coins"
        ]);
    }

    function add_coins()
    {
        $this->admin_page_loader("add_coins", [
            "title" => "Add Coins"
        ]);
    }
    function edit_coins()
    {
        $this->admin_page_loader("edit_coins", [
            "title" => "Edit Coins"
        ]);
    }

    function manage_notes()
    {
        $this->admin_page_loader("manage_notes", [
            "title" => "Manage Notes"
        ]);
    }

    function add_notes()
    {
        $this->admin_page_loader("add_notes", [
            "title" => "Add notes"
        ]);
    }
    function edit_notes()
    {
        $this->admin_page_loader("edit_notes", [
            "title" => "Edit notes"
        ]);
    }

    function manage_stamp()
    {
        $this->admin_page_loader("manage_stamp", [
            "title" => "Manage stamp"
        ]);
    }
    function add_stamp()
    {
        $this->admin_page_loader("add_stamp", [
            "title" => "Add stamp"
        ]);
    }
    function edit_stamp()
    {
        $this->admin_page_loader("edit_stamp", [
            "title" => "Edit stamp"
        ]);
    }

    function manage_products()
    {
        $latestTwentyFiveProducts = Product::orderBy("id","desc")->with("product_category")->get();

        $this->admin_page_loader("manage_products", [
            "title" => "Manage Products",
            "latest_twenty_five_products" => $latestTwentyFiveProducts
        ]);
    }
    function add_product()
    {
        $this->admin_page_loader("add_product", [
            "title" => "Add New Product"
        ]);
    }
    function edit_product($id)
    {
        $productToEdit = Product::find($id);
        $allProductCats = ProductCategory::all();
        $this->admin_page_loader("edit_product", [
            "title" => "Edit Product",
            "productToEdit" => $productToEdit,
            "product_categories" => $allProductCats
        ]);
    }

    function manage_categories()
    {
        $this->admin_page_loader("manage_categories", [
            "title" => "Manage Categories"
        ]);
    }
    function add_category()
    {
        $this->admin_page_loader("add_category", [
            "title" => "Add Category"
        ]);
    }
    function edit_category()
    {
        $this->admin_page_loader("edit_category", [
            "title" => "Edit Category"
        ]);
    }

    function manage_orders()
    {
        $this->admin_page_loader("manage_orders", [
            "title" => "Manage Orders"
        ]);
    }
    function view_order()
    {
        $this->admin_page_loader("view_order", [
            "title" => "View order"
        ]);
    }

    function manage_history()
    {
        $this->admin_page_loader("manage_history", [
            "title" => "Manage History"
        ]);
    }
    function add_history()
    {
        $this->admin_page_loader("add_history", [
            "title" => "Add History"
        ]);
    }
    function edit_history()
    {
        $this->admin_page_loader("edit_history", [
            "title" => "Edit History"
        ]);
    }

    function manage_enquiry()
    {
        $this->admin_page_loader("manage_enquiry", [
            "title" => "Manage Enquiry"
        ]);
    }
    function view_enquiry()
    {
        $this->admin_page_loader("view_enquiry", [
            "title" => "view Enquiry"
        ]);
    }

    function manage_event()
    {
        $this->admin_page_loader("manage_event", [
            "title" => "Manage Event"
        ]);
    }
    function add_event()
    {
        $this->admin_page_loader("add_event", [
            "title" => "Add Event"
        ]);
    }
    function edit_event()
    {
        $this->admin_page_loader("edit_event", [
            "title" => "Edit event"
        ]);
    }

    function manage_news()
    {
        $this->admin_page_loader("manage_news", [
            "title" => "Manage news"
        ]);
    }
    function add_news()
    {
        $this->admin_page_loader("add_news", [
            "title" => "Add news"
        ]);
    }
    function edit_news()
    {
        $this->admin_page_loader("edit_news", [
            "title" => "Edit news"
        ]);
    }

    function manage_member()
    {
        $this->admin_page_loader("manage_member", [
            "title" => "Manage member"
        ]);
    }
    function add_member()
    {
        $this->admin_page_loader("add_member", [
            "title" => "Add member"
        ]);
    }
    function edit_member()
    {
        $this->admin_page_loader("edit_member", [
            "title" => "Edit member"
        ]);
    }

    function manage_banners()
    {
        $this->admin_page_loader("manage_banners", [
            "title" => "Manage banners"
        ]);
    }

    function manage_video()
    {
        $this->admin_page_loader("manage_video", [
            "title" => "Manage video"
        ]);
    }

    function manage_story_week()
    {
        $this->admin_page_loader("manage_story_week", [
            "title" => "Manage Story of Week"
        ]);
    }
    function add_story_of_week()
    {
        $this->admin_page_loader("add_story_of_week", [
            "title" => "Add Story of Week"
        ]);
    }
    function edit_story_of_week()
    {
        $this->admin_page_loader("edit_story_of_week", [
            "title" => "Edit Story of Week"
        ]);
    }

    function manage_media_coverage()
    {
        $this->admin_page_loader("manage_media_coverage", [
            "title" => "Manage Media Coverage"
        ]);
    }
    function add_media_coverage()
    {
        $this->admin_page_loader("add_media_coverage", [
            "title" => "Add Media Coverage"
        ]);
    }
    function edit_media_coverage()
    {
        $this->admin_page_loader("edit_media_coverage", [
            "title" => "Edit Media Coverage"
        ]);
    }

    function manage_career()
    {
        $this->admin_page_loader("manage_career", [
            "title" => "Manage Career"
        ]);
    }
    function add_career()
    {
        $this->admin_page_loader("add_career", [
            "title" => "Add Career"
        ]);
    }
    function edit_career()
    {
        $this->admin_page_loader("edit_career", [
            "title" => "Edit Career"
        ]);
    }
    function manage_period()
    {
        $this->admin_page_loader("manage_period", [
            "title" => "Manage Period"
        ]);
    }
    function manage_dynasty()
    {
        $this->admin_page_loader("manage_dynasty", [
            "title" => "Manage Dynasty"
        ]);
    }
    function manage_ruler()
    {
        $this->admin_page_loader("manage_ruler", [
            "title" => "Manage Ruler"
        ]);
    }

    function manage_stamps()
    {
        $this->admin_page_loader("manage_stamps", [
            "title" => "Manage Stamps"
        ]);
    }

    function manage_events()
    {
        $this->admin_page_loader("manage_events", [
            "title" => "Manage Events"
        ]);
    }

    function manage_feedback()
    {
        $this->admin_page_loader("manage_feedback", [
            "title" => "Manage Feedback"
        ]);
    }

    function manage_review()
    {
        $this->admin_page_loader("manage_review", [
            "title" => "Manage Review"
        ]);
    }

    function manage_members()
    {
        $this->admin_page_loader("manage_members", [
            "title" => "Manage Members"
        ]);
    }

    function manage_watermark()
    {
        $this->admin_page_loader("manage_watermark", [
            "title" => "Manage Watermark"
        ]);
    }
}
