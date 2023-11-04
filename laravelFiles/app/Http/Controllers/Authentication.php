<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Admin;
class Authentication extends Controller
{

    private $salt = 'DYhG93b0qyJfIxfs2guVoUubWwvni';

    function member_login(Request $request)
    {


        $memberModel = new Member();

        $memberData = $memberModel->where("email", $request->username)->first();

        if ($memberData) {

            $encryptedPassword = md5($this->salt . $request->password);


            if ($memberData["password"] == $encryptedPassword) {
                $nameArray = explode(" ", $memberData["name"]);
                session([
                    "member_id" => $memberData["id"],
                    "first_name" => $nameArray[0],
                    "last_name" => $nameArray[1],
                    "email" => $memberData["email"],
                    "level" => $memberData["type"],
                    "type" => "member"
                ]);
                return "login-success";
            } else {
                return "login-failed";
            }
        } else {
            return "login-failed";
        }
    }

    function member_registration(Request $request){

        print_r($request);

    }

    function logout()
    {
        session()->flush();
        return redirect(url("/application/login"));
    }


    function admin_login(Request $request){

        $emailEntered = $request->admin_username;

        $passwordEntered = $request->admin_password;

        $adminModel = new Admin();

        $adminData = $adminModel->where("email",$emailEntered)->first();

        
        
        if ($adminData) {

            if (password_verify($passwordEntered,$adminData["password"])) {

                session([

                    "admin_id" => $adminData["id"],
                    "first_name" => $adminData["first_name"],
                    "last_name" => $adminData["last_name"],
                    "type" => "admin"

                ]);

                return "login-success";
                
            } else {
         
                return "login-failed";
                
            }
             
        } else {
            
            return "login-failed";

        }
        

    }

}
