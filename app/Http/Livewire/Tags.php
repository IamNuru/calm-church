<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $tagsid;
    protected $listeners = ['get_tags' => 'render'];

    public function render()
    {
        return view('livewire.tags')
            ->with('tags_id', $this->tagsid);
    }
}
