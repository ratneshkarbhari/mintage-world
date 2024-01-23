<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class Periods extends Controller
{
    
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
                "category_id" => $request->type,
                "order_by" => $request->orderby
    
            ];

            Period::find($request->periodId)->update($periodData);
            return redirect()->to(url('admin/manage-period'));

                
        }



    }

}
