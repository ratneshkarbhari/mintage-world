<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './laravelFiles/vendor/autoload.php';


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function send_email($to,$toName,$subject,$message){

        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://www.ultrasofttoys.com/public/mintage-email-api/send_email.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //             "postvar1=value1&postvar2=value2&postvar3=value3");

        // In real life you should use something like:
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query([
                    'recipient_email' => $to,
                    'recipient_name' => $toName,
                    'subject' => $subject,
                    'message' => $message                    
                ]));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);


        curl_close($ch);
        
        
        return TRUE;


    }

}
