<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Ruler;
use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use App\Models\History;
use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            "breadCrumbData" => [
                [
                    "label" => "Coins"
                ]
            ],
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

            $periods = $periodModel->where("country_id",$countryId)->where("category_id",1)->orderBy('order_by', 'asc')->get();


            Cache::put('coin-'.$slugParts[1].'-periods',$periods);

        }

        $periods = Cache::get('coin-'.$slugParts[1].'-periods');

        $country = Country::find($countryId);

        $this->page_loader("periods",[
            "title" => "Coins of ".$countryName,
            "info_title" => "Periods : ".$countryName,
            "periods" => $periods,
            "breadCrumbData" => [
                [
                    "slug" => "coins/",
                    "label" => "Coins"
                ],
                [
                    // "slug" => "coin/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ]
            ],
            "url_prefix" => "coin/dynasty/",
            "image_base_url" => getenv("PERIOD_IMAGE_BASE_URL"),
            "parent" => $country,
            "footer_content" =>$country["footer_content"]
        ]);

    }


    function coin_dynasties($periodId){
        


        if(!Cache::get('coin-dynasties-'.$periodId)){

            $dynastyModel = new Dynasty();

            $dynasties = $dynastyModel->where("period_id",$periodId)->orderBy("order_by","desc")->get();


            Cache::put('coin-dynasties-'.$periodId,$dynasties);

        }

        $dynasties = Cache::get('coin-dynasties-'.$periodId);

        $period = Period::find($periodId);

        $country = Country::find($period["country_id"]);

        $this->page_loader("dynasties",[
            "title" => $period["title"]." Coins | Coins of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period Coins | Mintage World",
            "info_title" => "Dynasties : ".$period["title"],
            "dynasties" => $dynasties,
            "breadCrumbData" => [
                [
                    "slug" => "coins/",
                    "label" => "Coins"
                ],
                [
                    "slug" => "coin/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ],
                [
                    "label" => $period["title"]
                ]
            ],
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
            "breadCrumbData" => [
                [
                    "slug" => "coins/",
                    "label" => "Coins"
                ],
                [
                    "slug" => "coin/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ],
                [
                    "slug" => "coin/dynasty/".$period["id"],
                    "label" => $period["title"]
                ],
                [
                    "label" => $dynasty["title"]
                ]
            ],
            "footer_content" =>$dynasty["footer_content"]
        ]);

    }


    function coin_list($rulerId){
        


        // if(!Cache::get('coins-'.$rulerId)){

        //     $coinModel = new Coin();

        //     $coins = $coinModel->where("ruler_id",$rulerId)->with("denomination")->with("metal")->with("rarity")->with("shape")->paginate(12);


        //     Cache::put('coins-'.$rulerId,$coins);

        // }

        

        // $coins = Cache::get('coins-'.$rulerId);


        $coinModel = new Coin();

        $coins = $coinModel->where("ruler_id",$rulerId)->with("denomination")->with("metal")->with("rarity")->with("shape")->paginate(12);

        $ruler = Ruler::find($rulerId);


        $dynasty = Dynasty::find($ruler["dynasty_id"]);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $dynastyRulers = Ruler::where("dynasty_id",$dynasty["id"])->get();



        $denominations = $metals = $rarities = $mints = [];


        foreach ($coins as $coin) {
            
            $denominations[] = $coin["denomination"];
            $metals[] = $coin["metal"];
            $rarities[] = $coin["rarity"];
            $mints[] = $coin["mint"];
            $shapes[]  = $coin["shape"];
            
        }

        $total = $coins->total();
        $currentPage = $coins->currentPage();
        $perPage = $coins->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";


        $this->page_loader("list",[
            "title" => "Coins of ".$ruler["title"]." | Mintage World",
            "info_title" => "Coins : ".$ruler["title"],
            "coins" => $coins,
            "dynasty" => $dynasty,
            "ruler" => $ruler,
            "dynastyRulers" => $dynastyRulers,
            "denominations" => array_unique($denominations),
            "metals" => array_unique($metals),
            "rarities" => array_unique($rarities),
            "mints" => array_unique($mints),
            "shapes" => array_unique($shapes),
            "pagination_info_string" => $paginationInfoString,
            "breadCrumbData" => [
                [
                    "slug" => "coins/",
                    "label" => "Coins"
                ],
                [
                    "slug" => "coin/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ],
                [
                    "slug" => "coin/dynasty/".$period["id"],
                    "label" => $period["title"]
                ],
                [
                    "slug" => "coin/ruler/".$dynasty["id"],
                    "label" => $dynasty["title"]
                ],
                [
                    "label" => $ruler["title"]
                ]
            ],
            "footer_content" => $ruler["footer_content"]
        ]);

    }



    function coin_detail($coinId){


        $coinModel = new Coin();

        $coin = $coinModel->with("denomination")->with("metal")->with("calendar_system")->with("ruler")->with("minting_technique")->with("shape")->with("rarity")->with("feedback.member")->find($coinId);

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
            "breadCrumbData" => [
                [
                    "slug" => "coins/",
                    "label" => "Coins"
                ],
                [
                    "slug" => "coin/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ],
                [
                    "slug" => "coin/dynasty/".$period["id"],
                    "label" => $period["title"]
                ],
                [
                    "slug" => "coin/ruler/".$dynasty["id"],
                    "label" => $dynasty["title"]
                ],
                [
                    "slug" => "coin/list/".$ruler["id"],
                    "label" => $ruler["title"]
                ],
                [
                    "label" => $coin["denomination"]["title"]
                ]
            ],
            "footer_content" => ""
        ]);

    }


    function info_filter_exe(Request $request){

        $denominations = $request->denominations;
        $metals = $request->metals;
        $rarities = $request->rarities;
        $shapes = $request->shapes;
        $mints = $request->mints;

        $hasFilterParams = FALSE;

        

        $rulerId = $request->ruler_id;

        
        $query = 'SELECT coin.obverse_image,coin.id,denomination.title 
        FROM coin JOIN denomination ON coin.denomination_id = denomination.id   JOIN shape ON coin.shape_id = shape.id JOIN rarity ON coin.rarity_id = rarity.id JOIN metal ON coin.metal_id = metal.id WHERE 1 ';



        if(!empty($denominations)){
            $hasFilterParams = TRUE;
            $query.=' AND denomination.id IN ('.implode(",",$denominations).')'; 
        }

        if(!empty($metals)){
            $hasFilterParams = TRUE;
            $query.=' AND metal.id IN ('.implode(",",$metals).')';
        }

        if(!empty($rarities)) {
            $hasFilterParams = TRUE;
            $query.=' AND rarity.id IN ('.implode(",",$rarities).')';

        }

        if(!empty($shapes)){
            $hasFilterParams = TRUE;
            $query.=' AND shape.id IN ('.implode(",",$shapes).')';

        }

        if(!empty($mints)){
            $hasFilterParams = TRUE;
            $query.='AND coin.mint IN ("'.implode(",",$mints).'")';

        }

        $query.=' AND coin.ruler_id ='.$rulerId;


        if($hasFilterParams){

    
            $coins = json_decode(json_encode(DB::select($query)),TRUE);

        }else {

            if (!Cache::get('coins-'.$rulerId)) {

                $coinModel = new Coin();

                $coins = $coinModel->where("ruler_id",$rulerId)->with("denomination")->with("metal")->with("rarity")->with("shape")->get();
    
    
                Cache::put('coins-'.$rulerId,$coins);    
                
            }


            $coins = Cache::get("coins-".$rulerId);


        }


        $coinHtml = '';

        if (count($coins)>0) {
            
            foreach($coins as $coin){

                if($coin["obverse_image"]!=""){

                    $coinHtml.='<div class="col-lg-3 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="coin/'.$coin["id"].'">
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="'.getenv("COIN_IMAGE_BASE_URL").$coin["obverse_image"].'" alt="Medieval"><div class="info-meta text-center"><h2 class="info-item-grid-title">'.$coin["title"].'</h2></div></div>
                    </a></div>';

                }else{

                    $coinHtml.='<div class="col-lg-3 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="coin/'.$coin["id"].'">
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="'.getenv("API_DEFAULT_IMG_PATH").'" alt="Medieval"><div class="info-meta text-center"><h2 class="info-item-grid-title">'.$coin["title"].'</h2></div></div>
                    </a></div>';

                }
    
            }
            
        } else {
            
            $coinHtml = '<h4>No such coin found for this ruler</h4>';
            
        }
        

        return $coinHtml;
        
    }

}
