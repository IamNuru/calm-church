<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Post extends Component
{
    public $catid;
    protected $listeners = ['get_post_categories' => 'render'];

    public function render()
    {
        $categories = Category::get();
        return view('livewire.categories.post')
            ->with('categories', $categories)
            ->with('cat_id', $this->catid);
    }
}
