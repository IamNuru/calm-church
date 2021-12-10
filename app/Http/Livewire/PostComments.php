<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Comment;
use Livewire\Component;

class PostComments extends Component
{
    use WithPagination;

    public $pid;
    protected $listeners = ['get_comments' => 'render'];

    public function render()
    {
        $comments = Comment::where('post_id',$this->pid)->latest()->paginate(10);
        return view('livewire.post-comments')->with('comments',$comments);
    }
}
