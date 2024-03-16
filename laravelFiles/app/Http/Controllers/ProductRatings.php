<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatings extends Controller
{
    function toggle_status(Request $request)  {

        
        $productRatingId = $request->review_id;

        $productRating = ProductRating::find($productRatingId);

        if ($productRating["approval"]=="0") {
            $statusToSet = "1";
        } else {
            $statusToSet = "0";
        }
        

        $productRating->update([
            "approval" => $statusToSet
        ]);

        if ($productRating->save()) {
            return [
                "result" => "success"
            ];
        } else {
            return [
                "result" => "failure"
            ];
        }
        

    }

}
