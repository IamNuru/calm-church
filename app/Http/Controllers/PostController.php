<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3|max:300',
            'content' => 'required|string|min:3',
            'image' => 'nullable|image',
            'category' => 'required',
            'rank' =>'nullable|integer'
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
            $path = $request->file('image')->storeAs('public/images/posts', $filenameToStore);
        } 
        $post = new Post;
        $post->category_id = $request->category;
        $post->user_id =  Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug(($request->title).'-'.Date('m-d-y h:i'));
        $post->description = $request->description;
        $post->content = $request->content;
        $post->rank = $request->rank;
        $post->header = $request->header;
        if($request->file('image')){
            $post->image = $filenameToStore;
        }
        if ($request->status) {
            $post->status = $request->status;
        }

        $post->save();
        $post->tags()->sync($request->tags, false);

        return redirect()->back()->with('success', 'Post saved');
        
    }


    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|min:3|max:75',
            'description' => 'required|string|min:3|max:300',
            'content' => 'required|string|min:3',
            'image' => 'nullable|image',
            'category' => 'required'
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
            $path = $request->file('image')->storeAs('public/images/posts', $filenameToStore);
        } 
        
        $post = Post::where('id', $id)->first();
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->rank = $request->rank;
        $post->header = $request->header;
        if($request->file('image')){
            $post->image = $filenameToStore;
        }
        if ($request->status) {
            $post->status = $request->status;
        }
        $post->save();

        return redirect()->route('posts')->with('success', 'Post Updated');
        
    }


    public function destroy($id){
        $post = Post::where('id',$id)->first();

        $post->destroy();
        return redirect()->back()->with('success', 'Post Deleted');
    }



    public function changePostStatus($id){
        $post = Post::where('id',$id)->first();
        $post->status = !$post->status;
        $post->update();
        return redirect()->back()->with('success', 'Post status changed');
    }
}
