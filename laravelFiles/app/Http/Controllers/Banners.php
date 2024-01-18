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
