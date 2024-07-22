<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // Importez la classe ContactFormMail

class AccueilController extends Controller
{
    //

    public function index(){

        $clients = Client::orderBy('created_at', 'desc')->get();

        return view('Accueil/index',compact('clients'));
    }

    public function contact(){


        return view('Accueil/contact');
    }

    public function testView(){


        return view('mails/contact_mail');
    }

    function postMessage(Request $request){

        $request->validate([
            'email'=>'required|email'
        ]);
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'message'=> $request->message,
        ];
       //dd($data);

        Mail::to('carinedupont513@gmail.com')->send(new ContactFormMail($data));
        //dd( Mail::to('carinedupont513@gmail.com')->send(new ContactFormMail($data))
    //);

        return back()->with('msg','Merci pour le test');
    }
}
