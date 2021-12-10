<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'description' => 'nullable|string|min:3',
            'partnerMessage' => 'nullable|string|min:3',
            'logo' => 'nullable|image',
        ]);

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->partner_message = $request->partnerMessage;
        $partner->logo = $request->logo;
        $partner->phone = $request->phone;
        $partner->save();

        return redirect()->back()->with('success', 'Partner Saved');
    
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'description' => 'nullable|string|min:3',
            'partnerMessage' => 'nullable|string|min:3',
            'logo' => 'nullable|image',
        ]);

        $partner = Partner::where('id', $id)->first();
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->partner_message = $request->partnerMessage;
        $partner->logo = $request->logo;
        $partner->phone = $request->phone;
        $partner->save();

        return redirect()->back()->with('success', 'Partner saved');
    
    }

    public function destroy($id){
        $partner = Partner::where('id', $id)->first();
        $partner->destroy();

        return redirect()->back()->with('success', 'Partner deleted');
    }

}
