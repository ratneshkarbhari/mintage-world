<?php

namespace App\Http\Controllers;

use App\Models\MediaCoverage;
use App\Models\MediaCoveragePdf;
use Illuminate\Http\Request;

class MediaCoverages extends Controller
{
    
    function create(Request $request)  {
        

        $mediaCoverageObj = [
            "title" => $request->title,
            "datetime" => $request->datetime,
            "desc" => $request->description,
            "img" => NULL,
            "video_url" => $request->video_url,
            "media_url" => $request->media_url,
            "featured" => 0,
            "user_name" => "",
            "active" => "1",
            "login_created_ip" => $_SERVER['REMOTE_ADDR'],
            "login_created_uagent" => $_SERVER['HTTP_USER_AGENT']
        ];

        if($mcId = MediaCoverage::insertGetId($mediaCoverageObj)){


            if($request->hasFile("pdf_files")){

                if(count($pdfFiles = $request->file("pdf_files"))>0){

                    $uploadPath = "./mediacoverage/";
                    
                    $fileCounter = 0;

                    foreach ($pdfFiles as $pdfFile) {

                        $pdfFileName = $pdfFile->getClientOriginalName();

                        $pdfFile->move($uploadPath,$pdfFileName);

                        $mediaCoveragePdfObj = [

                            "pdf_name" => $pdfFileName,
                            "publication_name" => $request->pdf_titles[$fileCounter],
                            "pdf_url" => "/mediacoverage/".$pdfFileName,
                            "m_id" => $mcId

                        ];

                        MediaCoveragePdf::insert($mediaCoveragePdfObj);

                        $fileCounter++;
                        
                    }



                }

            }

            return [
                "result" => "success",
                "message" => "Media coverage item added"
            ];

        }else{

            return [
                "result" => "failure",
                "message" => "Media coverage item add failed"
            ];

        }

    }
    
}
