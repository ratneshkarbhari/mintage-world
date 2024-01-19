<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class Banners extends Controller
{
    
    function create_new(Request $request){

        $uploadPath = './assets/images/banners/';

        $landscapeImageFile = $request->file("desktop_banner");
        $potraitImageFile = $request->file("touch_banner");

        $landscapeImageName = $landscapeImageFile->getClientOriginalName();
        $potraitImageName = $potraitImageFile->getClientOriginalName();

        $landscapeImageFile->move($uploadPath,$landscapeImageFile->getClientOriginalName());

        $potraitImageFile->move($uploadPath,$potraitImageFile->getClientOriginalName());



        $newBannerObject = [

            "title" => $request->title,
            "alt" => $request->alt,
            "slide_order" => $request->order,
            "link" => $request->link,
            "image_landscape" => $landscapeImageName,
            "image_potrait" => $potraitImageName,
            "status" => "1" 

        ];

        $bannerModel = new Banner();

        $bannerCreated = $bannerModel->create($newBannerObject);

        return redirect()->to(url("admin/manage-banners"));
       
        
    }

    function update(Request $request){

        $bannerId = $request->bannerId;

        if($prevBannerData = Banner::find($bannerId)){

            $uploadPath = './assets/images/banners/';


            if($request->hasFile("desktop_banner")){

                $landscapeImageFile = $request->file("desktop_banner");

                $landscapeImageName = $landscapeImageFile->getClientOriginalName();

                $prevDesktopBannerPath = $uploadPath.$prevBannerData['image_landscape'];

                if(is_file($prevDesktopBannerPath)){
                    unlink($prevDesktopBannerPath);
                }

                $landscapeImageFile->move($uploadPath,$landscapeImageFile->getClientOriginalName());


            }else{
                $landscapeImageName = $prevBannerData["image_landscape"];
            }


            if($request->hasFile("touch_banner")){

                $potraitImageFile = $request->file("touch_banner");

                $potraitImageName = $potraitImageFile->getClientOriginalName();

                $prevTouchBannerPath = $uploadPath.$prevBannerData['image_potrait'];

                if(is_file($prevTouchBannerPath)){
                    unlink($prevTouchBannerPath);
                }

                $potraitImageFile->move($uploadPath,$potraitImageFile->getClientOriginalName());


            }else{
                $potraitImageName = $prevBannerData["image_potrait"];
            }

            $updateBannerObj = [

                "title" => $request->title,
                "alt" => $request->alt,
                "slide_order" => $request->order,
                "link" => $request->link,
                "image_landscape" => $landscapeImageName,
                "image_potrait" => $potraitImageName,
                "status" => "1" 
    
            ];

            Banner::find($bannerId)->update($updateBannerObj);

            return redirect()->to(url("admin/manage-banners"));


        }

    }

    function set_status(Request $request){
        $bannerId = $request->bannerId;
        $statusToSet = $request->statusToSet;
        Banner::find($bannerId)->update([
            "status" => $statusToSet
        ]);
        return true;
    }

}
