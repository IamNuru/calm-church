<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class MailController extends Controller
{
    public function welcomeEmail(){
        Mail::to('abdnurudeen@gmail.com')->send(new WelcomeMail);
        return new WelcomeMail();
    }


    public function unsubNewsletter($id, $email){
        $decrypted = Crypt::decryptString($id);
        $sub = Subscriber::whereId($decrypted+0)->first();
        return view('pages.unsubscribe.newsletter')
                    ->with('id', $id)
                    ->with('sub', $sub);
    }

    public function unsubNews($id){
        $sub = Subscriber::whereId($id)->first();
        $sub->status = false;
        $sub->update();
    }

    public function subNews($id){
        $sub = Subscriber::whereId($id)->first();
        $sub->status = true;
        $sub->update();
    }
}
