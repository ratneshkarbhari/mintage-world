<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use App\Models\History;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Histories extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function history()
    {

        $periods = Period::where("country_id",1)->where("category_id",1)->get();

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id=17 AND history.history!="" AND history.download_file!=""');

        $histories = json_decode(json_encode($histories),TRUE);

        $this->page_loader("history", [
            "title" => "History | History of Ancient India | Mintage World",
            "periods" => $periods,
            "histories" => $histories
        ]);

    }


    function history_detail($historySlug)
    {



        $historySlugParts = explode("-",$historySlug);

        

        $history = History::find($historySlugParts[0]);
        
        $periods = Period::where("country_id",1)->where("category_id",1)->get();

        if(!$history){
            $history = History::find($historySlug);


            if(!$history){

                return redirect(url("history"));

            }
        }

        $dynasty = Dynasty::find($history["dynasty_id"]);

        if(!$dynasty){
            return redirect(url("history"));
        }

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$dynasty["period_id"].' AND history.history!="" AND history.download_file!=""');


        $this->page_loader("history_detail", [
            "title" => "History | History of ".$dynasty["title"]." | Mintage World",
            "periods" => $periods,
            "dynasty" => $dynasty,
            "histories_options"=>json_decode(json_encode($histories),TRUE),
            "history" => $history
        ]);
    }

    function get_histories_dropdown_for_period(){

        $period_id = $_GET["period_id"];

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$period_id.' AND history.history!="" AND history.download_file!=""');


        $histories = json_decode(json_encode($histories),TRUE);

        $historiesOptionHtml = '<option value="">Select History</option>';

        foreach ($histories as $history) {
            $historiesOptionHtml.='<option value="'.$history["id"].'-'.strtolower(Str::slug($history["title"])).'">'.$history["title"].'</option>';
        }

        return $historiesOptionHtml;

    }

    function get_histories_grid_for_period(){

        $period_id = $_GET["period_id"];

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$period_id.' AND history.history!="" AND history.download_file!=""');


        $histories = json_decode(json_encode($histories),TRUE);

        $historiesGridHtml = '';

        foreach ($histories as $history) {
            if(is_file(getenv("DYNASTY_IMAGE_BASE_URL").$history["image"])){

                $historiesGridHtml.='<div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                <a href="'.url("history/detail/".$history["id"]).''.strtolower(Str::slug($history["title"])).'">
                   <div class="info-item-grid-box">
                      <img src="'.getenv("DYNASTY_IMAGE_BASE_URL").$history["image"].'" class="img-fluid" alt="'.$history["title"].'">
                      <div class="info-meta text-center">
                         <h2 class="info-item-grid-title">'.$history["title"].'</h2>
                      </div>
                   </div>
                </a>
                </div>';

            }else {
                
                $historiesGridHtml.='<div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                <a href="'.url("history/detail/".$history["id"]).'">
                   <div class="info-item-grid-box">
                      <img src="'.getenv("API_DEFAULT_IMG_PATH").'" class="img-fluid" alt="'.$history["title"].'">
                      <div class="info-meta text-center">
                         <h2 class="info-item-grid-title">'.$history["title"].'</h2>
                      </div>
                   </div>
                </a>
                </div>';

            }
        }

        return $historiesGridHtml;

    }


}
