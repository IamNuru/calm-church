<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use illuminate\Support\Str;

class ProductController extends Controller
{
    public function storeparephenial(Request $request){
        $request->validate([
            'title' => 'required|string|min:1|max:75',
            'category' => 'required|integer',
            'description' => 'required|string|min:3|max:300',
            'content' => 'required|string|min:3',
            'amount' => 'nullable|integer|min:1',
            'discount' => 'nullable|integer|min:1|lt:amount',
            'qty' => 'nullable|integer|min:0',
            'image' => 'required|image',
        ]);
        if ($request->file('image')) {
            // if ($request->hasFile('image')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('image')->storeAs('public/images/products', $filenameToStore);
        }
        
        $product = new Product;
        $product->user_id =  Auth::id();
        $product->title =  $request->title;
        $product->product_category_id =  $request->category;
        $product->slug = Str::slug(($request->title).'-'.(Date('m-d-y h:i')));
        $product->description =  $request->description;
        $product->content =  $request->content;
        $product->amount =  $request->amount;
        $product->discount =  $request->discount;
        $product->qty =  $request->qty;
        if ($request->file('image')) {
            $product->image =  $filenameToStore;
        }
        $product->save();

        return redirect()->back()->with('success', 'Parephenial Saved');

    }

    public function updateparephenial(Request $request, $id){
        $request->validate([
            'title' => 'required|string|min:1|max:75',
            'category' => 'required|integer',
            'description' => 'required|string|min:3|max:300',
            'content' => 'required|string|min:3',
            'amount' => 'nullable|integer|min:1',
            'discount' => 'nullable|integer|min:1|lt:amount',
            'qty' => 'nullable|integer|min:0',
            'image' => 'nullable|image',
        ]);
        if ($request->file('image')) {
            // if ($request->hasFile('image')) {

            //Get file name with Extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //File name to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //get file path
            $path = $request->file('image')->storeAs('public/images/products', $filenameToStore);
        }
        
        $product = Product::whereId($id)->first();
        if ($product) {
            $product->user_id =  Auth::id();
            $product->title =  $request->title;
            $product->product_category_id =  $request->category;
            $product->description =  $request->description;
            $product->content =  $request->content;
            $product->amount =  $request->amount;
            $product->discount =  $request->discount;
            $product->qty =  $request->qty;
            if ($request->file('image')) {
                $product->image =  $filenameToStore;
            }
            $product->save();
    
            return redirect()->route('parephenials')->with('success', 'Parephenial Updated');
        }else{
            return redirect()->route('parephenials')->with('error', 'Something Went Wrong. Parephenial might not exist');
        }

    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();

        $product->destroy();
        return redirect()->back()->with('success', 'Product Deleted');
    }


    public function filterProducts(Request $request){
        $products = Product::whereBetween('amount', [$request->start_price, $request->end_price])->get();
        $categories = ProductCategory::orderBy('name','asc')->get();
        $popularProducts = Product::take(5)->get();
        return view('pages.Shop')
                    ->with('products', $products)
                    ->with('popularProducts', $popularProducts)
                    ->with('categories', $categories);
    }


    public function searchProducts(Request $request){
        $products = Product::where('title', 'like', '%'.$request->s.'%')
                        ->orWhere('description', 'like', '%'.$request->s.'%')
                        ->orWhere('content', 'like', '%'.$request->s.'%')
                        ->orderBy('title','asc')->get();
        $categories = ProductCategory::orderBy('name','asc')->get();
        $popularProducts = Product::take(5)->get();
        return view('pages.Shop')
                    ->with('products', $products)
                    ->with('popularProducts', $popularProducts)
                    ->with('categories', $categories);
    }
}
