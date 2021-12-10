<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use App\Models\SermonMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SermonMessageController extends Controller
{
    public function store(Request $request, $sid){
        $request->validate([
            'message' => 'required|min:5|max:150'
        ]);
        $found = Sermon::whereId($sid)->first();

        if ($found) {
            $sermonM = new SermonMessage;
            $sermonM->user_id = Auth::id();
            $sermonM->sermon_id = $sid;
            $sermonM->message = $request->message;
            $sermonM->save();
         } else {
             return redirect()->back()->with('error', 'Something went wrong. Refresh Page');
         }
    }

    public function update(Request $request, $id){
        $request->validate([
            'message' => 'required|min:5|max:150'
        ]);
        $sermonM = SermonMessage::whereId($id)->first();

        if ($sermonM) {
            $sermonM->user_id = Auth::id();
            $sermonM->message = $request->message;
            $sermonM->save();
         } else {
             return redirect()->back()->with('error', 'Something went wrong. Refresh Page');
         }
    }
}
