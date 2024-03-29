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

    function history()
    {

        $periods = Period::where("country_id",1)->where("category_id",1)->get();

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id=17 AND history.history!="" AND history.download_file!=""');

        $histories = json_decode(json_encode($histories),TRUE);

        // dd($histories);

        $this->page_loader("history", [
            "title" => "History | History of Ancient India ",
            "periods" => $periods,
            "histories" => $histories,
            "description" => "India was ruled by a number of dynasties through the ages. Read about the dynastic history of Ancient India and learn of life during the ancient era",
            "keywords" => "Stamps of India, Indian Stamps, Indian Stamp, Rare Indian Stamps, Rare Stamps of India, Stamps in India, Old Indian Stamps, Rare Indian Postage Stamps, Indian Stamps Collection, Indian Rare Stamps"
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
            "title" => $history['meta_title'],
            "periods" => $periods,
            "dynasty" => $dynasty,
            "histories_options"=>json_decode(json_encode($histories),TRUE),
            "history" => $history,
            "description" => $history['meta_desc'],
            "keywords" => $history['meta_key']
        ]);
    }

    function get_histories_dropdown_for_period(){

        $period_id = str_replace("/","",$_GET["period_id"]);

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$period_id.' AND history.history!="" AND history.download_file!=""');


        $histories = json_decode(json_encode($histories),TRUE);

        $historiesOptionHtml = '<option value="">Select History</option>';

        foreach ($histories as $history) {
            $historiesOptionHtml.='<option value="'.$history["id"].'-'.strtolower(Str::slug($history["title"])).'">'.$history["title"].'</option>';
        }

        return $historiesOptionHtml;

    }

    function get_histories_grid_for_period(){

        $period_id = str_replace("/","",$_GET["period_id"]);

        // echo 'SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$period_id.' AND history.history!="" AND history.download_file!=""';

        // exit;

        
        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id='.$period_id.' AND history.history!="" AND history.download_file!=""');



        $histories = json_decode(json_encode($histories),TRUE);

        $historiesGridHtml = '';

        // dd($histories);

        foreach ($histories as $history) {



            if($history["image"]!=""){

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


    function download_exe($historyId){
        
        $historyData = History::find($historyId);

        $data = file_get_contents(url('assets/history-pdfs/'.$historyData["download_file"]));
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment;filename=".$historyData["download_file"]);
      
        echo $data;
      
        
    }

}
