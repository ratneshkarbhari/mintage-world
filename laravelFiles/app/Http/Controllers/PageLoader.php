<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Note;
use App\Models\Event;
use App\Models\Media;
use App\Models\Metal;
use App\Models\Order;
use App\Models\Ruler;
use App\Models\Shape;
use App\Models\Stamp;
use App\Models\Banner;
use App\Models\Period;
use App\Models\Rarity;
use App\Models\Country;
use App\Models\Dynasty;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\Denomination;
use Illuminate\Http\Request;
use App\Models\MediaCoverage;
use App\Models\ThemeCategory;
use App\Models\CalendarSystem;
use App\Models\ProductCategory;
use App\Http\Controllers\Orders;
use App\Models\MintingTechnique;
use App\Models\ProductRating;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PageLoader extends Controller
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


        if (!$featuredLightHouse = Cache::get("featured_lighthouse")) {

            $lightHouseQuery = 'SELECT * FROM products WHERE status = "Active" AND instock > 0 AND sku IN (325853,309759,304772,339365,319991,347998,358073,341943,327468,308045) LIMIT 10';

            $featuredLightHouse = json_decode(json_encode(DB::select($lightHouseQuery)), TRUE);


            Cache::set("featured_books", $featuredLightHouse);
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

        $banners = Banner::where("status", "1")->get();

        $this->page_loader("home", [
            "title" => "Online Museum of Coins, Stamps and Notes",
            "random_lighthouse" => $featuredLightHouse,
            "random_coins" => $featuredCoins,
            "random_notes" => $featuredNotes,
            "random_accessories" => $featuredAccessories,
            "random_stamps" => $featuredStamps,
            "news_items" => $entries,
            "banners" => $banners,
            "description" => "Mintage World - Online Museum and Collectorspedia. It is the world`s first online museum in India and a one-stop shop for information on coins, notes and stamps for budding and seasoned collectors and students.",
            "keywords" => "coins of india, online museum of coins, online museum in India for coins, online museum in India for notes, online museum in India for stamps, museum of coins, museum in India for coins, museum in India for notes"
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

        $latestEightOrders = $orderModel->orderBy("id", "desc")->limit(10, 0)->get();


        $latestEightProducts = $productModel->orderBy("id", "desc")->limit(10, 0)->get();

        $this->admin_page_loader("dashboard", [
            "title" => "Dashboard",
            "latest_orders" => $latestEightOrders,
            "latest_products" => $latestEightProducts
        ]);
    }

    function manage_coins()
    {
        $coins = Coin::paginate(12);
        $total = $coins->total();
        $currentPage = $coins->currentPage();
        $perPage = $coins->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        $this->admin_page_loader("manage_coins", [
            "title" => "Manage Coins",
            "coins" => $coins,
            "pagination_string" => $paginationInfoString
        ]);
    }

    function add_coin($success = "", $error = "")
    {
        $rulers = Ruler::all();
        $denominations = Denomination::all();
        $metals = Metal::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();
        $calendarSystems = CalendarSystem::all();
        $mintingTechniques = MintingTechnique::all();

        $this->admin_page_loader("add_coin", [
            "title" => "Add Coin",
            "rulers" => $rulers,
            "metals" => $metals,
            "shapes" => $shapes,
            "denominations" => $denominations,
            "rarities" => $rarities,
            "calendar_systems" => $calendarSystems,
            "minting_techniques" => $mintingTechniques
        ]);
    }
    function edit_coin($id)
    {
        $rulers = Ruler::all();
        $denominations = Denomination::all();
        $metals = Metal::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();
        $calendarSystems = CalendarSystem::all();
        $mintingTechniques = MintingTechnique::all();

        $this->admin_page_loader("edit_coin", [
            "title" => "Edit Coin",
            "coin" => Coin::find($id),
            "rulers" => $rulers,
            "metals" => $metals,
            "shapes" => $shapes,
            "denominations" => $denominations,
            "rarities" => $rarities,
            "calendar_systems" => $calendarSystems,
            "minting_techniques" => $mintingTechniques
        ]);
    }

    function manage_notes()
    {

        $notes = Note::paginate(12);
        $total = $notes->total();
        $currentPage = $notes->currentPage();
        $perPage = $notes->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";


        $this->admin_page_loader("manage_notes", [
            "title" => "Manage Notes",
            "notes" => $notes,
            "pagination_string" => $paginationInfoString
        ]);
    }

    function add_note()
    {
        $allDenominations = Denomination::all();
        $dynasties = Dynasty::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();
        $this->admin_page_loader("add_note", [
            "title" => "Add Note",
            "denominations" => $allDenominations,
            "dynasties" => $dynasties,
            "shapes" => $shapes,
            "rarities" => $rarities,
            "calendar_systems" => CalendarSystem::all()
        ]);
    }
    function edit_note($id)
    {
        $allDenominations = Denomination::all();
        $dynasties = Dynasty::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();

        $this->admin_page_loader("edit_note", [
            "title" => "Edit Note",
            "note" => Note::find($id),
            "denominations" => $allDenominations,
            "dynasties" => $dynasties,
            "shapes" => $shapes,
            "rarities" => $rarities
        ]);
    }
    function manage_stamp()
    {
        $this->admin_page_loader("manage_stamp", [
            "title" => "Manage Stamp"
        ]);
    }
    function add_stamp()
    {

        $themeCategories = ThemeCategory::all();
        $dynasties = Dynasty::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();

        $this->admin_page_loader("add_stamp", [
            "title" => "Add Stamp",
            "themeCategories" => $themeCategories,
            "dynasties" => $dynasties,
            "shapes" => $shapes,
            "rarities" => $rarities
        ]);
    }
    function edit_stamp($id)
    {
        $stampData = Stamp::find($id);
        $themeCategories = ThemeCategory::all();
        $dynasties = Dynasty::all();
        $shapes = Shape::all();
        $rarities = Rarity::all();

        $this->admin_page_loader("edit_stamp", [
            "title" => "Edit Stamp",
            "themeCategories" => $themeCategories,
            "dynasties" => $dynasties,
            "shapes" => $shapes,
            "rarities" => $rarities,
            "stamp" => $stampData
        ]);
    }
    function manage_bulk_upload()
    {
        $this->admin_page_loader("manage_bulk_upload", [
            "title" => "Manage Bulk Upload"
        ]);
    }
    function manage_bulk_images_upload()
    {
        $this->admin_page_loader("manage_bulk_images_upload", [
            "title" => "Bulk Images Upload"
        ]);
    }
    function manage_product_category()
    {
        $this->admin_page_loader("manage_product_category", [
            "title" => "Denomination"
        ]);
    }
    function manage_seo()
    {
        $this->admin_page_loader("manage_seo", [
            "title" => "Manage SEO"
        ]);
    }



    function manage_products()
    {
        // $latestTwentyFiveProducts = Product::orderBy("id", "desc")->with("product_category")->get();

        $this->admin_page_loader("manage_products", [
            "title" => "Manage Products",
            "latest_twenty_five_products" => []
        ]);
    }
    function add_product()
    {
        $allProductCats = ProductCategory::all();

        $this->admin_page_loader("add_product", [
            "title" => "Add New Product",
            "product_categories" => $allProductCats,

        ]);
    }
    function edit_product($id)
    {
        $productToEdit = Product::find($id);
        $allProductCats = ProductCategory::all();
        $productsFromCat = Product::where("category", $productToEdit["category"])->get();
        $productVariations = ProductVariation::where("product_id", $id)->get();
        $this->admin_page_loader("edit_product", [
            "title" => "Edit Product",
            "productToEdit" => $productToEdit,
            "product_categories" => $allProductCats,
            "category_products" => $productsFromCat,
            "variations" => $productVariations
        ]);
    }

    function manage_categories()
    {

        $allProductCats = ProductCategory::all();

        $this->admin_page_loader("manage_categories", [
            "title" => "Manage Shopping Categories",
            "categories" => $allProductCats
        ]);
    }
    function add_category()
    {
        $allCategories = ProductCategory::all();
        $this->admin_page_loader("add_category", [
            "categories" => $allCategories,
            "title" => "Add Category"
        ]);
    }
    function edit_category($catId)
    {
        $parentCats = ProductCategory::all();
        $catData = ProductCategory::find($catId);
        $this->admin_page_loader("edit_category", [
            "title" => "Edit Category",
            "category" => $catData,
            "parentCats" => $parentCats
        ]);
    }

    function manage_orders()
    {
        if (!$orders = Cache::pull("orders")) {

            $orderModel = new Order();
            $orders = $orderModel->orderBy("id", "desc")->get();
        }

        $this->admin_page_loader("manage_orders", [
            "title" => "Manage Orders",
            "orders" => $orders
        ]);
    }
    function view_order($orderid)
    {

        $orderModel = new Order();

        $order = $orderModel->where("orderid", $orderid)->with("order_products")->with("member")->first();

        $this->admin_page_loader("view_order", [
            "title" => "View order",
            "order" => $order
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
            "title" => "Manage Event",
        ]);
    }
    function add_event()
    {


        $this->admin_page_loader("add_event", [
            "title" => "Add Event",

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

        $news = Media::where("status", '1')->orderBy("id", "desc")->get();

        $this->admin_page_loader("manage_news", [
            "title" => "Manage news",
            "news" => $news,
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

    function manage_banners($success = "", $failure = "")
    {

        $banners = Banner::orderBy("slide_order", "desc")->get();

        $this->admin_page_loader("manage_banners", [
            "title" => "Manage banners",
            "banners" => $banners
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

        $mediaCoverageModel = new MediaCoverage();

        $media_coverage_items = $mediaCoverageModel->with("pdf")->orderBy("id", "desc")->paginate(12);

        $this->admin_page_loader("manage_media_coverage", [
            "title" => "Manage Media Coverage",
            "media_coverage_items" => $media_coverage_items
        ]);
    }
    function add_media_coverage()
    {
        $this->admin_page_loader("add_media_coverage", [
            "title" => "Add Media Coverage"
        ]);
    }
    function edit_media_coverage($id)
    {
        $mcObj = new MediaCoverage();
        $mcData = $mcObj->with("pdf")->where("id", $id)->first();
        $this->admin_page_loader("edit_media_coverage", [
            "title" => "Edit Media Coverage",
            "media_coverage" => $mcData
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



        $periodModel = new Period();

        $allPeriods = $periodModel->all();

        $allCountries = Country::all();

        $this->admin_page_loader("manage_period", [
            "title" => "Manage Period",
            "periods" => $allPeriods,
            "countries" => $allCountries
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

        $events = Event::where("status", '1')->orderBy("id", "desc")->paginate(12);

        $total = $events->total();
        $currentPage = $events->currentPage();
        $perPage = $events->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        $this->admin_page_loader("manage_events", [
            "title" => "Manage Events",
            "events" => $events,
            "pagination_string" => $paginationInfoString
        ]);
    }

    function manage_feedback()
    {

        $allFeedBack = Feedback::orderBy("id", "desc")->with("member")->with("coin")->with("note")->with("stamp")->paginate(20);

        $total = $allFeedBack->total();
        $currentPage = $allFeedBack->currentPage();
        $perPage = $allFeedBack->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";


        $this->admin_page_loader("manage_feedback", [
            "title" => "Manage Feedback",
            "feedback_entries" => $allFeedBack,
            "pagination_string" => $paginationInfoString
        ]);
    }

    function manage_review()
    {

        $productRatingModel = new ProductRating();

        $allReviews = $productRatingModel->orderBy("id", "desc")->where("member_id", "!=", NULL)->with("product")->with("member")->paginate(12);


        $total = $allReviews->total();
        $currentPage = $allReviews->currentPage();
        $perPage = $allReviews->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        $this->admin_page_loader("manage_review", [
            "title" => "Manage Review",
            "reviews" => $allReviews,
            "pagination_info_string" => $paginationInfoString
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
    function manage_auction()
    {
        $this->admin_page_loader("manage_auction", [
            "title" => "Manage Auction"
        ]);
    }
    function manage_key_events()
    {
        $this->admin_page_loader("manage_key_events", [
            "title" => "Manage Key Events"
        ]);
    }
    function manage_coupon()
    {
        $this->admin_page_loader("manage_coupon", [
            "title" => "Manage Coupon"
        ]);
    }
}
