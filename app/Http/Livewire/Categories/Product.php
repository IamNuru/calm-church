<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\ProductCategory;

class Product extends Component
{
    public $catid;
    protected $listeners = ['get_product_categories' => 'render'];

    public function render()
    {
        $categories = ProductCategory::get();
        return view('livewire.categories.product')
            ->with('categories', $categories)
            ->with('cat_id', $this->catid);
    }
}
