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

    function update_profile(Request $request) {
        
        $nameParts = explode(" ",$request->full_name);

        $profileUpdateObj = [

            "name" => $request->full_name,
            "first_name" => $nameParts[0],
            "last_name" => $nameParts[1],
            "country_id" => $request->country,
            "state_id" => $request->state,
            "mobile" => $request->mobile_number,
            "city" => $request->city,
            "pincode" => $request->pincode,
            "address" => $request->address


        ];



        $memberData = Member::find(session("member_id"));

        if($memberData->update($profileUpdateObj)){
            return "success";
        }else{
            return "failure";
        }

    }

}
