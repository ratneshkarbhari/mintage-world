<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PDO;

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

    function forgot_password_code_verify_set_password(Request $request){

        $verify_code = $request->verify_code;
        $new_password = $request->new_password;
        $new_password_conf = $request->new_password_conf;

        $sessionSavedCode = session('password_reset_code');

        $staticPageLoader = new StaticPages();

        if ($sessionSavedCode==$verify_code) {
            if($memberData = Member::where("email",session("pwd_reset_email"))->first()){

                if($new_password!=$new_password_conf){

                    $staticPageLoader->forgotpassword("Passwords dont match");


                }else{

                    if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{8,}$/",$new_password)){

                        $encryptedPassword = md5($this->salt . $new_password);


                        Member::where("email",session("pwd_reset_email"))->update([
                            "password" => $encryptedPassword
                        ]);

                        $staticPageLoader->login("Password reset, login again to access account");

                    }else{

                        $staticPageLoader->forgotpassword("Password strength not enough");


                    }



                }

            }else{
                $staticPageLoader->forgotpassword("Invalid Email");

            }
        } else {
            $staticPageLoader->forgotpassword("Verification code incorrect");
        }

        exit;

    }

    function forgot_password(Request $request){

        $enteredEmail = $request->username;

        $memberModel = new Member();

        $memberExists = $memberModel->where("email",$enteredEmail)->first();

        $staticPageLoader = new StaticPages();

        if ($memberExists) {

            $code = rand(1000,9999);
            
            session(["password_reset_code"=>$code,"pwd_reset_email"=>$memberExists["email"]]);

            $passwordResetEmailBody = '
                Enter this code : '.$code.' on Mintage World to reset password
            ';

            $pwdResetEmailSent = $this->send_email($memberExists["email"],$memberExists["name"],"Password Reset code",$passwordResetEmailBody);

            if ($pwdResetEmailSent) {
                
                $staticPageLoader->pwd_reset_code_verify();
                
            } 
            

        }else{
            $staticPageLoader->forgotpassword("A user with this email does not exist");
        }

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

            $email = $request->EmailID;
            

            if ($memberCreated) {
                
                $code = rand(1000,9999);

                $message = '<p>This is your email verification code : '.$code.'</p>
                <p>Enter it on Mintage World to verify your account.</p>';

                $emailSendingResult = $this->send_email($email,$request->first_name,"Email Verification",$message);


                if(!$emailSendingResult){

                    echo "Email not sent";

                    exit;
                    
                }

                $memberObj["user_type"] = "member";
                
                $memberObj["verif_code"] = $code;

                $memberObj["member_id"] = $memberCreated->id;

                $memberObj["level"] = "Regular";

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
