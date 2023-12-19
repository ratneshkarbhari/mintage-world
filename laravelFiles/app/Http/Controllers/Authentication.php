<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

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

    // function member_registration(Request $request){

    //     print_r($request);

    // }

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

    private function send_verif_email($email,$name){
        
        $verifCode = rand(1000,9999);

        $emailVerifyMessage = '
            Enter this verification code on mintageworld.com : '.$verifCode.' to verify your email.<br>
        ';

        $this->send_email($email,$name,"Email Verification",$emailVerifyMessage);
        
        session(["email_verification_code"=>$verifCode,"email_to_verify"=>$email]);


        return $verifCode;

    }

    function registration(Request $request){
        
        $memberModel = new Member();

        $userWithEmail = $memberModel->where("email",$request->EmailID)->first();


        $staticPageLoader = new StaticPages();

        if ($userWithEmail) {

            $staticPageLoader->member("A member with this email already exists");

        } else {

            if($request->password!=$request->confPassword){
                
                $staticPageLoader->member("Passwords dont match");

                exit;

            }

            $collectingArray = json_decode(json_encode($request->collecting),TRUE);

            $encryptedPassword = md5($this->salt . $request->password);


            $memberObj = [


                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "name" => $request->first_name." ".$request->last_name,
                "email" => $request->EmailID,
                "password" => $encryptedPassword,
                "mobile" => $request->MobileNo,
                "country_id" => 113,
                "type" => "Regular",
                "email_verified" => 0,
                "listing" => $request->listing,
                "collecting" => json_encode($collectingArray)
                

            ];

            $memberCreated = $memberModel->create($memberObj);

            

            if ($memberCreated) {
                $code = $this->send_verif_email($request->EmailID,$request->first_name." ".$request->last_name);

                

                $memberObj["user_type"] = "member";
                
                $memberObj["verif_code"] = $code;

                $memberObj["member_id"] = $memberCreated->id;

                session($memberObj);
                $staticPageLoader->verify_email();        

            } else {
                
                $staticPageLoader->member("Registration failed please try after some time");


            }
            

           

        }
        

    }

    function verify_email (Request $request){

        $enteredVerifCode = $request->verif_code;

        $staticPageLoader = new StaticPages();

        if(session("verif_code")==$enteredVerifCode){


            $memberModel = new Member();

            $memberModel->where("email", session("email_to_verify"))->update([
                "email_verified" => 1
            ]);            

            return redirect(url("member/dashboard/"));


        }else{

            $staticPageLoader->verify_email("","Incorrect verification code");        
            exit;

        }

    }

}
