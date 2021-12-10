<?php

namespace App\Http\Livewire;

use App\Models\SermonCategory as ModelsCategory;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class SermonCategory extends Component
{
    use WithPagination;
    public $name;
    public $description;
    public $hiddenId;
    public function render()
    {
        $categories = ModelsCategory::with('sermons')->paginate(5);
        return view('livewire.sermon-category')
        ->with('categories', $categories);
    }


    public function store(){
        if ($this->hiddenId) {
            $this->validate([
                'name' => 'required|string|min:3|max:20',
                'description' => 'required|string|min:3|max:100'
            ]);
            $category = ModelsCategory::whereId($this->hiddenId)->first();
            $category->name = $this->name;
            $category->description = $this->description;
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
                'name' => 'required|string|min:3|max:20|unique:sermon_categories,name',
                'description' => 'required|string|min:3|max:20'
            ]);
            $category = new ModelsCategory;
            $category->name = $this->name;
            $category->description = $this->description;
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
            $this->description = $category->description;
            $this->hiddenId = $category->id;
        } else {
            session()->flash('error', 'Something went wrong!!!. Refresh page');
        }
    }

    public function destroy($id){
        $category = ModelsCategory::destroy($id);
    }

    public function clear(){
        $this->hiddenId = "";
        $this->name = "";
        $this->description = "";
        $this->emit('get_sermon_categories');

    }
}
