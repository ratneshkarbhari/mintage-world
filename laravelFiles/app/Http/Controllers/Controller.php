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


    function send_email($to,$subject,$message){

        $headers = [
            'From' => 'Mintage World <mintmail@mintageworld.com>',
            'X-Sender' => 'testsite <mintmail@mintageworld.com>',
            'X-Mailer' => 'PHP/' . phpversion(),
            'X-Priority' => '1',
            'Return-Path' => 'mintmail@mintageworld.com',
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/html; charset=iso-8859-1'
        ];
        
        return mail($to, $subject, $message, $headers);

    }

}
