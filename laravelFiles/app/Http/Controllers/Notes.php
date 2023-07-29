<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Notes extends Controller
{

    private function page_loader($viewName, $data)
    {

        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function note_countries()
    {



        if (!Cache::get('note_countries')) {

            $countryModel = new Country();


            $data = $countryModel->where("category_id", 2)->get();

            Cache::put('note_countries', $data);
        }

        $data = Cache::get("note_countries");

        $footer_content = "<h1> Different Currencies of the World Countries</h1>
                         <p>Mintage World is a unique online portal where you can access information about world currency in a very systematic manner. Different currencies of the world are classified on the website based on country name at the first level. World banknotes are further classified based on various time periods and governing bodies. You won't find many websites where you can deeply research about rare banknotes of the world, category-wise. Researchers, students and notaphilists can make the most of this wonderful online platform to increase their knowledge base. The best part is that the website is extremely user-friendly. Navigation through the website is extremely smooth. All you have to do is apply the required filters and narrow-down your search based on what information you are looking for!</p><p>By closely studying world paper money, one can learn about various interesting historical and economical aspects of a particular country. Many of these rare world banknotes are sold by auction houses for impressive amounts. Apart from knowledge, the hobby can also become a new source of income. But the most important requirement for pursuing this hobby is research. Without having sound knowledge for various kinds of world banknotes, you won't be able to build a good collection. Apart from that, without research you wouldn't be able to analyse the market value of banknotes of the world.</p><p>The moment you add interesting banknotes from around the world to your collection, you can look up on Mintage World to find relevant information. Apart from high resolution images, we also offer detailed obverse and reverse descriptions for your perusal. Other important information like security features, date of issue, etc is also mentioned. </p><p>The website is simply perfect for someone who loves collecting different currencies of the world! So what are you waiting for? Start building your collection right away!</p>";


        $this->page_loader("countries_notes", [
            "title" => "Notes From Around the World, now at Your Fingertips",
            "info_title" => "Notes",
            "countries" => $data,
            "breadCrumbsData" => json_encode([
                "notes" => FALSE
            ]),
            "url_prefix" => "note/",
            "image_base_url" => getenv("COUNTRY_FLAG_IMAGE_BASE_URL"),
            "footer_content" => $footer_content
        ]);
    }

    function note_country_periods($slug){
        
        $slugParts = explode("-",$slug);

        $countryId = $slugParts[0];

        $countryName = ucfirst($slugParts[1]);

        if(!Cache::get('note-'.$slugParts[1].'-periods')){

            $periodModel = new Period();

            $periods = $periodModel->where("country_id",$countryId)->where("category_id",2)->get();


            Cache::put('note-'.$slugParts[1].'-periods',$periods);

        }

        $periods = Cache::get('note-'.$slugParts[1].'-periods');

        $country = Country::find($countryId);

        $this->page_loader("periods_notes",[
            "title" => "Notes of ".$countryName,
            "info_title" => "Periods : ".$countryName,
            "periods" => $periods,
            "breadCrumbsData" => json_encode([
                "notes" => TRUE,
                "country" => [
                    "id" => $country["id"],
                    "name" => $country["name"]
                ]
            ]),
            "url_prefix" => "note/dynasty/",
            "image_base_url" => getenv("PERIOD_IMAGE_BASE_URL"),
            "parent" => $country,
            "footer_content" =>$country["footer_content"]
        ]);

    }


    function note_dynasties($periodId){

        if(!Cache::get('note-dynasties-'.$periodId)){

            $dynastyModel = new Dynasty();

            $dynasties = $dynastyModel->where("period_id",$periodId)->get();


            Cache::put('note-dynasties-'.$periodId,$dynasties);

        }

        $dynasties = Cache::get('note-dynasties-'.$periodId);

        $period = Period::find($periodId);

        $country = Country::find($period["country_id"]);

        $this->page_loader("dynasties_notes",[
            "title" => $period["title"]." notes | notes of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period notes | Mintage World",
            "info_title" => "Dynasties : ".$period["title"],
            "dynasties" => $dynasties,
            "breadCrumbsData" => json_encode([
                "notes" => TRUE,

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

    function note_denominations($dynastyId){



        if(!Cache::get('note-denominations-'.$dynastyId)){

                
            $denominationQuery = 'SELECT note.denomination_unit as unit,denomination.id,note.obverse_image, note.denomination_unit, denomination.title FROM note JOIN dynasty dy ON note.dynasty_id=dy.id JOIN denomination on denomination.id = note.denomination_id WHERE note.dynasty_id = 135 GROUP BY note.denomination_unit';

            $denominations = DB::select($denominationQuery);

            $denominations = json_decode(json_encode($denominations),TRUE);

            Cache::put('note-denominations-'.$dynastyId,$denominations);

        }

        $dynasty = Dynasty::find($dynastyId);

        $denominations = Cache::get('note-denominations-'.$dynastyId);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $this->page_loader("denominations_notes",[
            "title" => $period["title"]." notes | notes of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period notes | Mintage World",
            "info_title" => "Denominations : ".$period["title"],
            "denominations" => $denominations,
            "breadCrumbsData" => json_encode([
                "notes" => TRUE,
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
                ]
            ]),
            "footer_content" =>$period["footer_content"]
        ]);

    }

}
