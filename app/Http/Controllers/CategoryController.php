<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:1|max:20|unique:categories,name'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category created');
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:1|max:20'
        ]);

        $category = Category::where('id',$id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category updated');
    }

    public function destroy($id){
        $category = Category::where('id',$id)->first();
        $category->destroy();
        return redirect()->back()->with('success', 'Category deleted');
    }


    public function show($id){
        $category = Category::where('id',$id)->first();
        return redirect()->back()->with('category', $category);
    }

}
