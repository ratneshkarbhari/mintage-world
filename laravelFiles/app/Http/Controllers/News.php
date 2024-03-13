<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class News extends Controller
{

    function get_all(){
        
        $allNews = Media::orderBy("id","desc")->get();

        $allNews = json_encode(["data"=>$allNews], JSON_INVALID_UTF8_IGNORE);

        echo $allNews;

    }

    function update(Request $request) {


        if($newsData = Media::find($request->id)){

            $uploadPath = "./assets/images/news";

            if ($request->hasFile("image")) {
                $newsImageFile = $request->file("image");

                $newsImageName = $newsImageFile->getClientOriginalName();

                $newsImageFile->move($uploadPath,$newsImageName);

                if (!is_file(getenv("PRODUCT_IMAGE_BASE_URL").$newsImageName)) {

                    $s3 = new AwsS3();

                
                    $s3->upload($newsImageName,$uploadPath.$newsImageName,"mint-news","ap-southeast-1");
                    
                }else{
    
                    $newsImageName = $newsData["image"];
    
                }
    

            }else{
                $newsImageName = $newsData["image"];
            }

            $newsObj = [
                "title" => $request->title,
                "custom_url" => $request->custom_url,
                "description" => $request->description,
                "media_date" => $request->date,
                "image" => $newsImageName,
                "status" => 1
            ];

            if ($newsData->update($newsObj)) {
                
                return redirect()->to(url("admin/manage-news"));
                
            } else {
                return redirect()->to(url("admin/manage-news"));
            }
            

        }


        
    }

    function create(Request $request) {

        $uploadPath = "./assets/images/news";

        if ($request->hasFile("image")) {
            $newsImageFile = $request->file("image");

            $newsImageName = $newsImageFile->getClientOriginalName();

            $newsImageFile->move($uploadPath,$newsImageName);

            if (!is_file(getenv("PRODUCT_IMAGE_BASE_URL").$newsImageName)) {

                $s3 = new AwsS3();

            
                $s3->upload($newsImageName,$uploadPath."/".$newsImageName,"mint-news","ap-southeast-1");
                
            }else{

                $newsImageName = "noimage.jpg";

            }


        }else{
            $newsImageName = "noimage.jpg";
        }

        $newsObj = [
            "title" => $request->title,
            "custom_url" => $request->custom_url,
            "description" => $request->description,
            "media_date" => $request->date,
            "image" => $newsImageName,
            "status" => 1
        ];

        if (Media::insert($newsObj)) {
            
            return redirect()->to(url("admin/manage-news"));
            
        } else {
            return redirect()->to(url("admin/manage-news"));
        }

    }
    
}
