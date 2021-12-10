<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function show($slug){
        //
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:15|unique:tags,name',
            'description' => 'nullable|string|min:3|max:150'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;
        $tag->save();
        
        return redirect()->back()->with('success', 'Tag Saved');

    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:3|max:15',
            'description' => 'nullable|string|min:3|max:150'
        ]);

        $tag = Tag::where('id', $id)->first();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;
        $tag->save();

        return redirect()->back()->with('success', 'Tag Updated');

    }

    public function destroy($id){
        $tag = Tag::whereId($id)->first();
        $tag->destroy();

        return redirect()->back()->with('success', 'Tag Deleted');
    }
}
