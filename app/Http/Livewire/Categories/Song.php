<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\SongCategory;

class Song extends Component
{
    public $catid;
    protected $listeners = ['get_sermon_categories' => 'render'];

    public function render()
    {
        $categories = SongCategory::get();
        return view('livewire.categories.sermon')
            ->with('categories', $categories)
            ->with('cat_id', $this->catid);
    }
}
