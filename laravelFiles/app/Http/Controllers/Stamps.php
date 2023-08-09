<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use App\Models\Period;
use App\Models\Dynasty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Stamps extends Controller
{
    
    private function page_loader($viewName,$data){

        echo view("components.header",$data);
        echo view("pages.".$viewName,$data);
        echo view("components.footer",$data);

    }

    function stamp_periods(){

        if(!Cache::get('stamp-periods')){

            $periodModel = new Period();

            $periods = $periodModel->where("category_id",3)->get();


            Cache::put('stamp-periods',$periods);

        }

        $periods = Cache::get('stamp-periods');

        $this->page_loader("stamps_periods",[
            "title" => "Stamps of India",
            "info_title" => "Periods",
            "periods" => $periods,
            "breadCrumbData" => [
                [
                    "label" => "Periods"
                ]
            ],
            "footer_content" => ""
        ]);



    }


    function stamp_types($periodId){

        if(!Cache::get('stamp-types-'.$periodId)){

            $types = Dynasty::where("period_id",$periodId)->get();


            Cache::put('stamp-types-'.$periodId,$types);

        }

        $period = Period::find($periodId);

        $types = Cache::get('stamp-types-'.$periodId);

        $this->page_loader("stamps_types",[
            "title" => "Stamps of India",
            "info_title" => "Types: ".$period["title"],
            "types" => $types,
            "breadCrumbData" => [
                [
                    "slug" => "stamp/",
                    "label" => "Periods"
                ],
                [
                    "label" => $period["title"]
                ]
            ],
            "footer_content" => ""
        ]);



    }

    function stamp_list($dynastyId){

        $dynasty = Dynasty::find($dynastyId);


        $period = Period::find($dynasty["period_id"]);

        $allStamps = Stamp::where("dynasty_id",$dynasty["id"])->with("theme_category")->with("shape")->get();

        $stamps = Stamp::where("dynasty_id",$dynasty["id"])->with("theme_category")->with("shape")->paginate(12);

        $dynastiesInPeriod = Dynasty::where("period_id",$period["id"])->get();


        $theme_categories = [];

        foreach ($allStamps as $stamp) {
            $theme_categories[] = $stamp["theme_category"];
        }

        $this->page_loader("stamps_list",[
            "title" => "Stamps of ".$dynasty["title"],
            "info_title" => "Stamps",
            "stamps" => $stamps,
            "dynastyId" => $dynastyId,
            "theme_categories" => array_unique($theme_categories),
            "breadCrumbData" => [
                [
                    "slug" => "stamp/",
                    "label" => "Periods"
                ],
                [
                    "slug" => "stamp/dynasty/".$period["id"],
                    "label" => $period["title"]
                ],
                [
                    "label" => $dynasty["title"]
                ]
            ],
            "dynasties_in_period" => $dynastiesInPeriod, 
            "footer_content" => ""
        ]);



    }


    function stamp_detail($stampId){

        $stamp = Stamp::where("id",$stampId)->with("shape")->with("theme_category")->with("feedback")->get();

        $stamp = $stamp[0];

        $dynasty = Dynasty::find($stamp["dynasty_id"]);

        $period = Period::find($dynasty["period_id"]);

        $this->page_loader("stamp_detail",[
            "title" => $stamp["stamp_name"],
            "stamp" => $stamp,
            "dynasty" => $dynasty, 
            "breadCrumbData" => [
                [
                    "slug" => "stamp/",
                    "label" => "Periods"
                ],
                [
                    "slug" => "stamp/dynasty/".$period["id"],
                    "label" => $period["title"]
                ],
                [
                    "slug" => "stamp/dynasty/".$dynasty["id"],
                    "label" => $dynasty["title"]
                ],
                [
                    "label" => $stamp["stamp_name"]
                ]
            ],
            "footer_content" => ""
        ]);


    }

    function stamp_info_filter_exe(Request $request){

        $themeCategories = $request->themeCategories;

        $stamps = DB::table('stamp')->where("dynasty_id",$request->dynasty_id)->whereIn('theme_category_id', $themeCategories)->get();

        $stampsHtml = '';

        $stamps = json_decode(json_encode($stamps),TRUE);

        foreach ($stamps as $stamp) {

            if(($stamp["obverse_image"]!="")){
                $imageHtml = '<img src="'.getenv("STAMP_IMAGE_BASE_URL").$stamp["obverse_image"].'" class="img-fluid">';
            }else{
                $imageHtml = '<img src="'.getenv("API_DEFAULT_IMG_PATH").'" class="img-fluid">';
            }
            $stampsHtml.='<div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="'.url("stamp/detail/".$stamp["id"]).'"><div class="info-item-grid-box">'.$imageHtml.'<div class="info-meta text-center"><h2 class="info-item-grid-title">'.$stamp["stamp_name"].'</h2></div></div></a></div>';
            
        }

        return $stampsHtml;

    }

}
