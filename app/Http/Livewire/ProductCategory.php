<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory as ModelsCategory;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductCategory extends Component
{
    use WithPagination;
    public $name;
    public $hiddenId;
    public function render()
    {
        $categories = ModelsCategory::with('products')->paginate(5);
        return view('livewire.product-category')
        ->with('categories', $categories)
        ->with('category', '');
    }


    public function store(){
        if ($this->hiddenId) {
            $this->validate([
                'name' => 'required|string|min:3|max:20'
            ]);
            $category = ModelsCategory::whereId($this->hiddenId)->first();
            $category->name = $this->name;
            $category->slug = Str::slug($this->name);
            $category->save();
            if ($category) {
                session()->flash('success', 'Category Updated');
                return $this->clear();
            } else {
                session()->flash('error', 'Something went wrong!!!. Refresh page');
            }
        } else {
            $this->validate([
                'name' => 'required|string|min:3|max:20|unique:categories,name'
            ]);
            $category = new ModelsCategory;
            $category->name = $this->name;
            $category->slug = Str::slug($this->name);
            $category->save();
            if ($category) {
                session()->flash('success', 'Category Created');
                return $this->clear();
            } else {
                session()->flash('error', 'Something went wrong!!!. Refresh page');
            }
        }
        
    }

    public function editcategory($id){
        $category = ModelsCategory::whereId($id)->first();
        if ($category) {
            $this->name = $category->name;
            $this->hiddenId = $category->id;
        } else {
            session()->flash('error', 'Something went wrong!!!. Refresh page');
        }
    }

    public function destroy($id){
        $category = ModelsCategory::destroy($id);
        return $this->clear();
    }

    public function clear(){
        $this->hiddenId = "";
        $this->name = "";
        $this->emit('get_product_categories');

    }
}
