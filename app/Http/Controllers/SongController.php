<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SongController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'artist' => 'required|string|min:1|max:50',
            'genre' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:3|max:300',
            'content' => 'nullable|string|min:3',
            'lyrics' => 'nullable|string|min:3',
            'category' => 'required|string|min:1|max:20',
            'amount' => 'nullable|integer|min:1',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        $pathToFile = $request->file('song');
        if ($request->file('cover_photo')) {
            // if ($request->hasFile('cover_photo')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('cover_photo')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('cover_photo')->storeAs('public/images/songs/cover', $filenameToStore);
        }
        
        $song = New Song;
        $song->title = $request->title;
        $song->cover_photo = $filenameToStore;
        $song->slug = Str::slug(($request->title).'-'.(Date('y-m-d')));
        $song->artist = $request->artist;
        $song->genre = $request->genre;
        $song->description = $request->description;
        $song->content = $request->content;
        $song->lyrics = $request->lyrics;
        $song->song_category_id = $request->category;
        $song->amount = $request->amount;
        $song->addMedia($pathToFile)->toMediaCollection();
        $song->save();
        $song->tags()->sync($request->tags, false);
        return redirect()->back()->with('success', "Song added successfully");
    }


    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'artist' => 'required|string|min:1|max:50',
            'genre' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:3|max:300',
            'content' => 'nullable|string|min:3',
            'lyrics' => 'nullable|string|min:3',
            'category' => 'required|string|min:1|max:20',
            'amount' => 'nullable|integer|min:1',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);
        $pathToFile = $request->file('song');
        if ($request->file('cover_photo')) {
            // if ($request->hasFile('cover_photo')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('cover_photo')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('cover_photo')->storeAs('public/images/songs/cover', $filenameToStore);
        }
        
        $song = Song::whereId($id)->first();
        $song->title = $request->title;
        if ($filenameToStore) {
            $song->cover_photo = $filenameToStore;
        }
        $song->slug = Str::slug(($request->title).'-'.(Date('y-m-d')));
        $song->artist = $request->artist;
        $song->genre = $request->genre;
        $song->description = $request->description;
        $song->content = $request->content;
        $song->lyrics = $request->lyrics;
        $song->song_category_id = $request->category;
        $song->amount = $request->amount;
        if ($pathToFile) {
            $song->addMedia($pathToFile)->toMediaCollection();
        }
        $song->save();
        return redirect()->route('songs')->with('success', "Song updated successfully");
    }
}
