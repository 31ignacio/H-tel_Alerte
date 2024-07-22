<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function sendWelcomeEmail(){

        $toEmail = "ahehehinnou31@gmail.com";
        $message = "ceci est mon message";
        $subject = "Bienvenu sur notre plateform";
        dd(10);

        $response = Mail:: to($toEmail)->send(new ContactFormMail($message, $subject));
   
        dd($response);
    }

}
