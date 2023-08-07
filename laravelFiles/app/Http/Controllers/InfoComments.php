<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class InfoComments extends Controller
{
    
    function create_exe(Request $request){

        $feedbackModel = new Feedback();

        $feedBacks = [
            1 => "coin",
            2 => "note",
            3 => "stamp"
        ];


        if($feedbackModel->where([[$feedBacks[$request->feedback_id]."_id",'=',$request->coin_id],["member_id","=",$request->member_id]])->get()){

            if ($feedbackModel->create([
                'feedback_id' => $request->feedback_id,
                "coin_id" => $request->coin_id,
                "note_id" => $request->note_id,
                "stamp_id" => $request->stamp_id,
                "comment" => $request->comment,
                "member_id"=>$request->member_id,
                "status" => "1"
            ])) {
                return "comment-posted";
            } else {
                return "comment-not-posted";
            }

        }else{

            return "comment-already-exists";

        }

        

    }

}
