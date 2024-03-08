<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use App\Models\Period;
use App\Models\Dynasty;
use Illuminate\Support\Str;
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

            $periods = $periodModel->where("category_id",3)->orderBy("order_by","asc")->get();


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
            "footer_content" => '<div class=""><h1>STAMPS OF INDIA</h1><p>The history of<strong>stamps of India</strong>begins with the Scinde Dawk, which is the oldest in Asia. India has issued a variety of stamps covering many themes. Stamps arose as a necessity for the sustenance of the postal service. As the postage was originally paid by the receiver, there was no guarantee that the addressee would accept the parcel. A stamp acts as a receipt of pre-payment to the postal service.<a href="http://www.mintageworld.com/stamp/list/78">Commemorative stamps</a>in<a href="http://www.mintageworld.com/stamp/dynasty/20">Independent India</a>cover birth anniversaries, death anniversaries, important events, and important developments highlighting the country.</p><p>The Scinde Dawk is a unique and rare<strong>stamp of India</strong>, the first to be issued in Asia by British India. It was issued by the British and is red sealing wax wafers with the design embossed upon it. These wafers were impressed upon paper and used by those seeking postal services. The Scinde Dawk was circulated in the Sindh region of India. The word `Scinde` is an anglicised version of `Sindh` while `Dawk` was the British pronunciation of the Hindi word `Dak` which means `Post`. This<i>old stamp</i>originally cost one half anna each, but today they feature as a rare collectible owing to the fact that less than 100 of these stamps exist today.</p><p>Scents are a peculiar, yet interesting theme for stamps in India.<i>Stamps</i>with sandalwood, jasmine, and rose fragrances have been released by the postal authority of India. You can also find rare stamps with meteorite dust issued in Austria or chocolate scented ones issued by Belgium, France and Switzerland. The ones issued by Switzerland has adhesive that actually tastes like chocolate.</p><p>Error stamps, those with printing mistakes, make for rare collectors` items and are actively sought out by avid philatelists. You can find that old stamps are a part of any philatelist`s collection. Philately is a budding hobby, and with so many unique stamps being issued by countries all over the world, the hobby is bound to expand. Many youngsters as well as adults are avid stamp collectors and people`s interest in the field of philately only grows.</p></div>'
        ]);



    }


    function stamp_types($periodId){

        if(!Cache::get('stamp-types-'.$periodId)){

            $types = Dynasty::where("period_id",$periodId)->orderBy("order_by","asc")->get();


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
                    "slug" => "stamp/dynasty/".$period["id"]."-".Str::slug($period["title"]),
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
                    "slug" => "stamp/dynasty/".$period["id"]."-".Str::slug($period["title"]),
                    "label" => $period["title"]
                ],
                [
                    "slug" => "stamp/dynasty/".$dynasty["id"]."-".Str::slug($dynasty["title"]),
                    "label" => $dynasty["title"]
                ],
                [
                    "label" => $stamp["stamp_name"]
                ]
            ],
            "footer_content" => ""
        ]);


    }

    function get_all_data(){
        
        $allStamps = Stamp::orderBy("id","desc")->get();

        $allStamps = json_encode(["data"=>$allStamps], JSON_INVALID_UTF8_IGNORE);

        echo $allStamps;

    }

    function create_new(Request $request) {


        $uploadPath = './assets/images/stamp/';


        if($request->hasFile("obverse_image")){

            $obverseImageFile = $request->file("obverse_image");

            $obverseImageName = $obverseImageFile->getClientOriginalName();

            $s3 = new AwsS3();


            $obverseImageFile->move($uploadPath,$obverseImageName);

            if (!is_file(getenv("NOTE_BASE_URL").$obverseImageName)) {

                $obverseImageNameS3Path = "stamp/list/".$obverseImageName;
                
                $s3->upload($obverseImageNameS3Path,$uploadPath.$obverseImageName,"mintage2","us-east-1");
                
            }

        }else{
            $obverseImageName = "noimage.jpg";
        }


        $data = [
            'shape_id'  => $request->shape,
            'catalogue_ref_no'  => $request->catalogue_ref_no,
            'type'  => $request->type,
            'obverse_image'  => $obverseImageName,
            'printing_process'  => $request->printing_process,
            'quantity_issued'  => $request->quantity_issued,
            'description'  => $request->description,
            'perforation'  => $request->perforation,
            'theme_category_id'  => $request->theme,
            'stamp_name'  => $request->stamp_name,
            'issued_date'  => $request->issued_date,
            'color'  => $request->color,
            'face_value'  => $request->face_value,
            'printed_at'  => $request->printed_at,
            'watermark'  => $request->watermark,
            'remark'  => $request->remark,
            'stamp_fdc_design'  => $request->stamp_fdc_design,
            'cancellation_design'  => $request->cancellation_design,
            'status'  => '0',
            'modified' => date('Y-m-d H:i:s'),
        ];


        // dd($data);

        $stampModel = new Stamp();

        if($stampModel->insert($data)){

            return [
                "result" => "success",
                
            ];
            

        }else{

            return [
                "result" => "failure",
                "message"=> "Stamp create failed"
            ];

        }

    }

    function update(Request $request){

        // dd($request);
        
        if($stampData = Stamp::find($request->id)){

            $uploadPath = './assets/images/stamp/';


            if($request->hasFile("obverse_image")){

                $obverseImageFile = $request->file("obverse_image");

                $obverseImageName = $obverseImageFile->getClientOriginalName();

                $s3 = new AwsS3();


                $obverseImageFile->move($uploadPath,$obverseImageName);

                if (!is_file(getenv("NOTE_BASE_URL").$obverseImageName)) {

                    $obverseImageNameS3Path = "stamp/list/".$obverseImageName;
                    
                    $s3->upload($obverseImageNameS3Path,$uploadPath.$obverseImageName,"mintage2","us-east-1");
                    
                }

            }else{
                $obverseImageName = $stampData["obverse_image"];
            }


            $data = [
                'shape_id'  => $request->shape,
                'catalogue_ref_no'  => $request->catalogue_ref_no,
                'type'  => $request->type,
                'obverse_image'  => $obverseImageName,
                'printing_process'  => $request->printing_process,
                'quantity_issued'  => $request->quantity_issued,
                'description'  => $request->description,
                'perforation'  => $request->perforation,
                'theme_category_id'  => $request->theme,
                'stamp_name'  => $request->stamp_name,
                'issued_date'  => $request->issued_date,
                'color'  => $request->color,
                'face_value'  => $request->face_value,
                'printed_at'  => $request->printed_at,
                'watermark'  => $request->watermark,
                'remark'  => $request->remark,
                'stamp_fdc_design'  => $request->stamp_fdc_design,
                'cancellation_design'  => $request->cancellation_design,
                'status'  => '0',
                'modified' => date('Y-m-d H:i:s'),
            ];


            // dd($data);


            if($stampData->update($data)){

                return [
                    "result" => "success",
                    
                ];
                

            }else{

                return [
                    "result" => "failure",
                    "message"=> "Stamp update failed"
                ];

            }

        }else{
            return [
                "result" => "failure",
                "message" => "Stamp not found"
            ];
        }

    }

    function stamp_info_filter_exe(Request $request){

        $themeCategories = $request->themeCategories;

        if(!is_null($themeCategories)){
            $stamps = DB::table('stamp')->where("dynasty_id",$request->dynasty_id)->whereIn('theme_category_id', $themeCategories)->get();
        }else{
            $stamps = DB::table('stamp')->where("dynasty_id",$request->dynasty_id)->get();
        }


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

        if($stampsHtml!=""){

            return [
                "html" => $stampsHtml,
                "status" => 200
            ];
    

        }else{

            return [
                "status" => 500
            ];

        }

    }

}
