<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use Illuminate\Http\Request;

class DonatorController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'firstName' => 'required|max:150',
            'lastName' => 'required|max:150',
            'email' => 'required|email',
            'amount' => 'required|decimal|min:1',
        ]);

        $donator = new Donator;
        $donator->first_name = $request->firstName;
        $donator->last_name = $request->lastName;
        $donator->email = $request->email;
        $donator->amount = $request->amount;
        $donator->transaction_ref = $request->transaction_ref;
        $donator->save();

        return redirect()->back()->with('success', 'Thanks for donating. May God richly bless you!!!');
    }
}
