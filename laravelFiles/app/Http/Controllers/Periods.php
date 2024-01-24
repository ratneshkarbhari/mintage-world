<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class Periods extends Controller
{

    function create(Request $request){

        
        $uploadPath = "./assets/images/period";


        if($featuredImageFile = $request->file("fileupload")){
        
            $periodImageName = $featuredImageFile->getClientOriginalName();
            $featuredImageFile->move($uploadPath,$periodImageName);


        }else{

            $periodImageName = "noname.jpg";

        }

        $periodData = [

            'title' => $request->title,
            'image' => $periodImageName,
            'country_id' => $request->country,
            "category_id" => $request->type,
            "order_by" => $request->orderby

        ];

        Period::create($periodData);

        return redirect()->to(url('admin/manage-period'));


    }
    
    function update(Request $request){

        $uploadPath = "./assets/images/period";


        if($prevPeriodData = Period::find($request->periodId)){

                
            if($featuredImageFile = $request->file("featured_image")){

                $periodImageName = $featuredImageFile->getClientOriginalName();

                $featuredImageFile->move($uploadPath,$periodImageName);

            }else{

                $periodImageName = $prevPeriodData["image"];

            }

            $periodData = [

                'title' => $request->title,
                'image' => $periodImageName,
                'country_id' => $request->country,
                "category_id" => $request->type,
                "order_by" => $request->orderby
    
            ];

            Period::find($request->periodId)->update($periodData);
            return redirect()->to(url('admin/manage-period'));

                
        }



    }

}
