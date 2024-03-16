<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use PDO;

class FeedbackController extends Controller
{
    
    function toggle_status(Request $request)  {

        
        $feedbackId = $request->feedback_id;

        $feedback = Feedback::find($feedbackId);

        if ($feedback["status"]=="0") {
            $statusToSet = "1";
        } else {
            $statusToSet = "0";
        }
        

        $feedback->update([
            "status" => $statusToSet
        ]);

        if ($feedback->save()) {
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
