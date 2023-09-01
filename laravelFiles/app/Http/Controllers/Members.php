<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class Members extends Controller
{
    
    function upgrade_to_premium(Request $request){

        $memberId = $request->member_id;

        $memberModel = new Member();

        $memberData = $memberModel->find($memberId);

        if ($memberData) {
            
            $memberData->type = "Premium";

            if($memberData->save()){

                return "membership-upgrade-successful";

            }else{

                return "membership-upgrade-failed";
                
            }
            
        } else {
            
            return "membership-upgrade-failed";
        
        }
        

    }

}
