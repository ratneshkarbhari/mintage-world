<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Dynasty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Stamp;

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

        $stamps = Stamp::where("dynasty_id",$dynasty["id"])->limit(12)->get();



        $dynastiesInPeriod = Dynasty::where("period_id",$period["id"])->get();



        $this->page_loader("stamps_list",[
            "title" => "Stamps of ".$dynasty["title"],
            "info_title" => "Stamps",
            "stamps" => $stamps,
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
                    // "slug" => "stamp/dynasty/".$dynasty["id"],
                    "label" => $dynasty["title"]
                ]
            ],
            "dynasties_in_period" => $dynastiesInPeriod, 
            "footer_content" => ""
        ]);



    }


    function stamp_detail($stampId){

        $stamp = Stamp::find($stampId);

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

}
