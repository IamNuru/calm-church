<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:2|max:20',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|string|email',
            'message' => 'required|string|min:3|max:500',
        ]);

        $app = new Appointment;
        $app->name =  $request->name;
        $app->phone =  $request->phone;
        $app->email =  $request->email;
        $app->message =  $request->message;
        $app->save();

        return redirect()->back()->with('success', 'Appointment booked successfully');
    }


    public function attendedToBy($appId, $id){
        $app = Appointment::whereId($appId)->where('attended_to_by' , '!==', 0)->first();
        if ($app) {
            $app->attended_to_by = $id;
            $app->save();
        } else {
            return redirect()->back()->with('success', 'Someting went wrong. Refresh page');
        }
    }
}
