<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class CreateTag extends Component
{
    use WithPagination;
    public $name;
    public $description;
    public $hiddenId;
    public function render()
    {
        $tags = Tag::with('posts')->paginate(5);
        return view('livewire.create-tag')
        ->with('tags', $tags)
        ->with('tag', '');
    }


    public function store(){
        if ($this->hiddenId) {
            $this->validate([
                'name' => 'required|string|min:3|max:20',
                'description' => 'nullable|string|min:3|max:100',
            ]);
            $tag = Tag::whereId($this->hiddenId)->first();
            $tag->name = $this->name;
            $tag->slug = str_slug($this->name);
            $tag->description = $this->description;
            $tag->save();
            if ($tag) {
                session()->flash('success', 'Tag Updated');
                return $this->clear();
            } else {
                session()->flash('error', 'Something went wrong!!!. Refresh page');
            }
        } else {
            $this->validate([
                'name' => 'required|string|min:3|max:20|unique:tags,name',
                'description' => 'nullable|string|min:3|max:100',
            ]);
            $tag = new Tag;
            $tag->name = $this->name;
            $tag->slug = str_slug($this->name);
            $tag->description = $this->description;
            $tag->save();
            if ($tag) {
                session()->flash('success', 'Tag Created');
                return $this->clear();
            } else {
                session()->flash('error', 'Something went wrong!!!. Refresh page');
            }
        }
        
    }

    public function edittag($id){
        $tag = Tag::whereId($id)->first();
        if ($tag) {
            $this->name = $tag->name;
            $this->description = $tag->description;
            $this->hiddenId = $tag->id;
        } else {
            session()->flash('error', 'Something went wrong!!!. Refresh page');
        }
    }

    public function destroy($id){
        $tag = Tag::destroy($id);
        $this->emit('get_tags');

    }

    public function clear(){
        $this->hiddenId = "";
        $this->name = "";
        $this->description = "";
        $this->emit('get_tags');
    }
}
