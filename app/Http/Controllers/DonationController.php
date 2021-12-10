<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3',
            'amount' => 'nullable|integer',
            'amountRaised' => 'nullable|integer',
            'ending_date' => 'nullable|date',
            'image' => 'required|image'
        ]);
        if ($request->file('image')) {
            // if ($request->hasFile('image')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('image')->storeAs('public/images/donations', $filenameToStore);
        } 
        
        $donation = new Donation;
        $donation->title = $request->title;
        $donation->slug = Str::slug(($request->title).'-'.Date('m-d-y'));
        $donation->description = $request->description;
        $donation->amount = $request->amount;
        if ($request->amountRaised) {
            $donation->amount_raised = $request->amountRaised;
        }
        if ($request->image) {
            $donation->image = $filenameToStore;
        }
        $donation->ending_date = $request->ending_date;
        $donation->save();

        return redirect()->back()->with('success', 'Donation succesfully saved');
    }


    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3',
            'amount' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        if ($request->file('image')) {
            // if ($request->hasFile('image')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('image')->storeAs('public/images/donations', $filenameToStore);
        } 

        $donation = Donation::where('id', $id)->first();
        $donation->title = $request->title;
        $donation->description = $request->description;
        $donation->amount = $request->amount;
        if ($request->image) {
            $donation->image = $filenameToStore;
        }
        $donation->ending_date = $request->ending_date;
        $donation->save();

        return redirect()->route('donations')->with('success', 'Donation succesfully updated');
    }


    public function destroy($id){
        $donation = Donation::where('id', $id)->first();
        $donation->destroy();

        return redirect()->back()->with('success', 'Donation succesfully deleted');
    }
}
