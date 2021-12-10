<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class PostComment extends Component
{
    public $post;
    public $name;
    public $email;
    public $message;

    
    public function render()
    {
        return view('livewire.post-comment')->with('post', $this->post);
    }

    public function submit(){
        $data = $this->validate([
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|string|email',
            'message' => 'required|string|min:2|max:300',
        ]);
        $comment  = new Comment;
        $comment->post_id  = $this->post->id;
        $comment->username  = $this->name;
        $comment->email  = $this->email;
        $comment->message  = $this->message;
        $comment->save();
        if ($comment) {
            session()->flash('success', 'Comment sent');
            $this->emit('get_comments');
            $this->name = '';
            $this->email = '';
            $this->message = '';
        } else {
            session()->flash('error', 'Something went wrong!!!. Refresh page');
        }
    }
}
