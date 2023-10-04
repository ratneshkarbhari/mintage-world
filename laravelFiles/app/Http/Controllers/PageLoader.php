<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
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
            
            $booksQuery = 'SELECT * FROM products WHERE status = "Active" AND instock > 0 AND category = 23 LIMIT 7';

            $featuredBooks = json_decode(json_encode(DB::select($booksQuery)),TRUE);


            Cache::set("featured_books",$featuredBooks);
            
        }


        if (!$featuredCoins = Cache::get("featured_coins")) {
            
            $coinsQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (18,24,25,26,27,28) LIMIT 7';

            $featuredCoins = json_decode(json_encode(DB::select($coinsQuery)),TRUE);

            Cache::set("featured_coins",$featuredCoins);
            
        }

        if (!$featuredNotes = Cache::get("featured_notes")) {
            
            $notesQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (35,36,37,38,39,40,41,42,43) LIMIT 7';

            $featuredNotes = json_decode(json_encode(DB::select($notesQuery)),TRUE);

            Cache::set("featured_notes",$featuredNotes);
            
        }
        

        if (!$featuredAccessories = Cache::get("featured_accessories")) {

            $accessoryQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (11,12,13,14) LIMIT 7';

            $featuredAccessories = json_decode(json_encode(DB::select($accessoryQuery)),TRUE);



            Cache::set("featured_accessories",$featuredAccessories);


        }


        // dd($featuredNotes);

        if (!$featuredStamps = Cache::get("featured_stamps")) {


            $stampQuery = 'SELECT * FROM products WHERE featured = 1 AND status = "Active" AND instock > 0 AND category IN (20,21,22,58,59,17,45,60) LIMIT 7';


            $featuredStamps = json_decode(json_encode(DB::select($stampQuery)),TRUE);

            Cache::get("featured_stamps",$featuredStamps);

        }

        

        $this->page_loader("home", [
            "title" => "Online Museum of Coins, Stamps and Notes",
            "random_books" => $featuredBooks,
            "random_coins" => $featuredCoins,
            "random_notes" => $featuredNotes,
            "random_accessories" => $featuredAccessories,
            "random_stamps" => $featuredStamps
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

    function manage_products()
    {

        $this->admin_page_loader("manage_products", [
            "title" => "Manage Products"
        ]);
    }
    
}
