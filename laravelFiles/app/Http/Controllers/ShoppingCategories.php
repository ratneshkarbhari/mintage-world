<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ShoppingCategories extends Controller
{
    
    function delete(Request $request){
        
        $catToDeleteId = $request->shopping_cat_id;

        if($deletedCatData = ProductCategory::find($catToDeleteId)->delete()){
            
            return "success";
            
        }else{
            return "failure";
        }

    }

    function update(Request $request){

        if($prevCatData = ProductCategory::find($request->catid)){


            if($request->Parent_Category==0){
                $type = "Parent";
            }else{
                $type = "Child";
            }

            $newCatObj = [
                "cat_name" => $request->cat_name,
                "desc1" => $request->editor,
                "meta_content" => $request->meta_content,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "custom_url" => $request->custom_url,
                "status" => $request->status,
                "parent" => $request->Parent_Category,
                "type" => $type
            ];


            if($prevCatData->update($newCatObj)){
                return "success";
            }else{
                return "failure";
            }

        }else{
            return "failure";

        }

    }

    function create(Request $request) {
        
        if($request->Parent_Category==0){
            $type = "Parent";
        }else{
            $type = "Child";
        }

        $newCatObj = [
            "cat_name" => $request->cat_name,
            "desc1" => $request->editor,
            "meta_content" => $request->meta_content,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "custom_url" => $request->custom_url,
            "status" => $request->status,
            "parent" => $request->Parent_Category,
            "type" => $type
        ];

        if (ProductCategory::create($newCatObj)) {
            return "success";
        } else {
            return "failure";
        }
        
    }

}
