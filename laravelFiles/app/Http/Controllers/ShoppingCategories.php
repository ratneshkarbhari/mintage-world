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

}
