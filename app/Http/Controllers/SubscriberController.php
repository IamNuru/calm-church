<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->with('success', 'You\'ve successfully subscribe to our newsletter ');
    }

    public function destroy($id){
        $subscriber = Subscriber::whereId($id)->first();
        $subscriber->destroy();

        return redirect()->back()->with('success', 'You\'ve successfully unsubscribed to our newsletter ');
    }
}
