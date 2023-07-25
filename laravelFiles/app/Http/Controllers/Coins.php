<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Ruler;
use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Coins extends Controller
{

    
    private function page_loader($viewName,$data){

        echo view("components.header",$data);
        echo view("pages.".$viewName,$data);
        echo view("components.footer",$data);

    }
    
    function coin_countries(){



        if(!Cache::get('coin_countries')){

            $countryModel = new Country();


            $data = $countryModel->where("category_id",1)->get();

            Cache::put('coin_countries',$data);

        }

        $data = Cache::get("coin_countries");
        
        $footer_content = "<h1>Biggest Online Encyclopaedia on Coins of the World</h1><p>This is a real eye-candy for all those lovers of world coins out there! What more could you ask for? A well-categorised database of coins from around the world with detailed descriptions and history is all that you need! For someone who is researching about rare world coins, this online portal gives you easy and simple access to all the information you need with just a few clicks. The coins of the world hosted on our website are broadly classed based on country name. They are then further sub-categorised based on different time periods and eras. Be it ancient world coins or modern coins from around the world, you will find it all!</p><p>The best part is that our team of researchers are constantly updating this database with more and more information. The common problem that most collectors or numismatists encounter today is compiling data from hundred different websites. Mintage World is a one-of-a-kind website where you will get to access information about different coins from around the world, all under one single roof. When you are searching for data or descriptions about your favourite world coins on our website, you also have the option to select a filter of your choice. Filters are based on various parameters like the metal content, year of issue, denomination etc. This simplifies your search process to a great extent. Apart from detailed obverse and reverse descriptions, the website also shows you high resolution images and catalogue references to make your life easier.</p><p>We believe that knowledge is of utmost importance when it comes to collecting coins of the world. That is exactly what we are offering here on Mintage World. It is the perfect online collectorspedia that allows you to completely indulge in your favourite hobby. So, the moment you add to your collection of world coins, remember to upgrade your knowledge from Mintage World!</p>";


        $this->page_loader("countries",[
            "title" => "Coins From Around the World, now at Your Fingertips",
            "info_title" => "Coins",
            "countries" => $data,
            "breadCrumbsData" => json_encode([
                "coins" => FALSE
            ]),
            "url_prefix" => "coin/",
            "image_base_url" => getenv("COUNTRY_FLAG_IMAGE_BASE_URL"),
            "footer_content" => $footer_content 
        ]);

        

    }

    function coin_country_periods($slug){
        
        $slugParts = explode("-",$slug);

        $countryId = $slugParts[0];

        $countryName = ucfirst($slugParts[1]);

        if(!Cache::get('coin-'.$slugParts[1].'-periods')){

            $periodModel = new Period();

            $periods = $periodModel->where("country_id",$countryId)->where("category_id",1)->get();


            Cache::put('coin-'.$slugParts[1].'-periods',$periods);

        }

        $periods = Cache::get('coin-'.$slugParts[1].'-periods');

        $country = Country::find($countryId);

        $this->page_loader("periods",[
            "title" => "Coins of ".$countryName,
            "info_title" => "Periods : ".$countryName,
            "periods" => $periods,
            "breadCrumbsData" => json_encode([
                "coins" => TRUE,
                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ]
            ]),
            "url_prefix" => "coin/dynasty/",
            "image_base_url" => getenv("PERIOD_IMAGE_BASE_URL"),
            "parent" => $country,
            "footer_content" =>$country["footer_content"]
        ]);

    }


    function coin_dynasties($periodId){
        


        if(!Cache::get('coin-dynasties-'.$periodId)){

            $dynastyModel = new Dynasty();

            $dynasties = $dynastyModel->where("period_id",$periodId)->get();


            Cache::put('coin-dynasties-'.$periodId,$dynasties);

        }

        $dynasties = Cache::get('coin-dynasties-'.$periodId);

        $period = Period::find($periodId);

        $country = Country::find($period["country_id"]);

        $this->page_loader("dynasties",[
            "title" => $period["title"]." Coins | Coins of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period Coins | Mintage World",
            "info_title" => "Dynasties : ".$period["title"],
            "dynasties" => $dynasties,
            "breadCrumbsData" => json_encode([
                "coins" => TRUE,

                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ],
                "period" => [
                    "id" => $period["id"],
                    "name" => $period["title"]
                ]
            ]),
            "footer_content" =>$period["footer_content"]
        ]);

    }

    function coin_rulers($dynastyId){
        


        if(!Cache::get('coin-rulers-'.$dynastyId)){

            $rulerModel = new Ruler();

            $rulers = $rulerModel->where("dynasty_id",$dynastyId)->get();


            Cache::put('coin-rulers-'.$dynastyId,$rulers);

        }

        $rulers = Cache::get('coin-rulers-'.$dynastyId);

        $dynasty = Dynasty::find($dynastyId);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $this->page_loader("rulers",[
            "title" => "Biggest Online Information Repository of ".$dynasty["title"]." Coins | Mintage World",
            "info_title" => "Rulers : ".$dynasty["title"],
            "rulers" => $rulers,
            "breadCrumbsData" => json_encode([
                "coins" => TRUE,

                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ],
                "period" => [
                    "id" => $period["id"],
                    "name" => $period["title"]
                ],
                "dynasty" => [
                    "id" => $dynasty["id"],
                    "name" => $dynasty["title"]
                ],
            ]),
            "footer_content" =>$dynasty["footer_content"]
        ]);

    }


    function coin_list($rulerId){
        


        if(!Cache::get('coins-'.$rulerId)){

            $coinModel = new Coin();

            $coins = $coinModel->where("ruler_id",$rulerId)->with("denomination")->get();


            Cache::put('coins-'.$rulerId,$coins);

        }

        $coins = Cache::get('coins-'.$rulerId);

        $ruler = Ruler::find($rulerId);

        $dynasty = Dynasty::find($ruler["dynasty_id"]);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $this->page_loader("list",[
            "title" => "Coins of ".$ruler["title"]." | Mintage World",
            "info_title" => "Coins : ".$ruler["title"],
            "coins" => $coins,
            "breadCrumbsData" => json_encode([
                "coins" => TRUE,
                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ],
                "period" => [
                    "id" => $period["id"],
                    "name" => $period["title"]
                ],
                "dynasty" => [
                    "id" => $dynasty["id"],
                    "name" => $dynasty["title"]
                ],
                "ruler" => [
                    "id" => $ruler["id"],
                    "name" => $ruler["title"]
                ]
            ]),
            "footer_content" => ""
        ]);

    }



    function coin_detail($coinId){


        $coinModel = new Coin();

        $coin = $coinModel->with("denomination")->with("metal")->with("calendar_system")->with("ruler")->with("minting_technique")->with("shape")->with("rarity")->with("feedback")->find($coinId);

        $ruler = $coin["ruler"];

        $dynasty = Dynasty::find($ruler["dynasty_id"]);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $history = History::where("dynasty_id",$dynasty["id"])->get();

        $this->page_loader("coin_detail",[
            "title" => "Coins of ".$ruler["title"]." | Mintage World",
            "info_title" => "Coins : ".$ruler["title"],
            "coin" => $coin,
            "denomination" => $coin["denomination"],
            "dynasty" => $dynasty,
            "ruler" => $ruler,
            "history" => substr($history[0]["history"],0,450),
            "breadCrumbsData" => json_encode([
                "coins" => TRUE,
                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ],
                "period" => [
                    "id" => $period["id"],
                    "name" => $period["title"]
                ],
                "dynasty" => [
                    "id" => $dynasty["id"],
                    "name" => $dynasty["title"]
                ],
                "ruler" => [
                    "id" => $ruler["id"],
                    "name" => $ruler["title"]
                ],
                "coin" => [
                    "id" => $coin["id"],
                    "name" => $coin["denomination"]["title"]
                ]
            ]),
            "footer_content" => ""
        ]);

    }

}
