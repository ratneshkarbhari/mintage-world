<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    
    private $salt = 'DYhG93b0qyJfIxfs2guVoUubWwvni';

    function member_login(Request $request){


        $memberModel = new Member();

        $memberData = $memberModel->where("email",$request->username)->first();

        if ($memberData) {

            $encryptedPassword = md5($this->salt.$request->password);


            if ($memberData["password"]==$encryptedPassword) {
                $nameArray = explode(" ",$memberData["name"]);
                session([
                    "member_id" => $memberData["id"],
                    "first_name" => $nameArray[0],
                    "last_name" => $nameArray[1],
                    "email" => $memberData["email"],
                    "type"=>"member"
                ]);
                return "login-success";
            } else {
                return "login-failed";
            }
            
        } else {
            return "login-failed";
        }
        


    }

    function logout(){
        session()->flush();
        return redirect(url("/"));
    }

}
