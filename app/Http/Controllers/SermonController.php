<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SermonController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:15|unique:sermons,name',
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3',
            'category' => 'required|integer',
            'image' => 'nullable|image',
        ]);
         //check if image is selected
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
            $path = $request->file('image')->storeAs('public/images/sermons', $filenameToStore);
        } 

        $sermon = new Sermon;
        $sermon->user_id =  Auth::id();
        $sermon->sermon_category_id = $request->category;
        $sermon->name = $request->name;
        $sermon->title = $request->title;
        $sermon->slug = Str::slug($request->name);
        $sermon->description = $request->description;
        if($request->file('image')){
            $sermon->image = $filenameToStore;
        }

        $sermon->save();

        return redirect()->back()->with('success', 'sermon saved');
        
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:3|max:15',
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3',
            'category' => 'required|integer',
            'image' => 'nullable|image',
        ]);
         //check if image is selected
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
            $path = $request->file('image')->storeAs('public/images/sermons', $filenameToStore);
        } 

        $sermon = Sermon::whereId($id)->first();
        $sermon->user_id =  Auth::id();
        $sermon->sermon_category_id = $request->category;
        $sermon->title = $request->title;
        $sermon->name = $request->name;
        $sermon->slug = Str::slug($request->name);
        $sermon->description = $request->description;
        if($request->file('image')){
            $sermon->image = $filenameToStore;
        }

        $sermon->save();

        return redirect()->route('sermons')->with('success', 'Sermon updated');
        
    }



    public function destroy($id){
        $sermon = Sermon::destroy($id);
        return redirect()->back()->with('message', 'Sermon deleted');

    }
}
