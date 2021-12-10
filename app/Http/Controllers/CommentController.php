<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|string|email',
            'message' => 'required|string|min:1|max:200',
        ]);

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->username = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->back()->with('success', 'Thanks for commenting on this post');
    }
}
