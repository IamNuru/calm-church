<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'message' => 'required|min:2|max:300',
            'rate' => 'nullable|integer|min:1|max:5',
        ]);

        $product = Product::whereId($id)->first();
        if (!$product) {
            # code...
        } else {
            $review = new ProductReview;
            $review->product_id = $product->id;
            $review->user_id = auth()->user->id;
            $review->message = $request->message;
            $review->rate = $request->rate;
            $review->save();

            return redirect()->back()->with('success', 'Review Submitted');
        }
        

    }
    public function update(Request $request, $id){
        $request->validate([
            'message' => 'required|min:2|max:300',
            'rate' => 'nullable|integer|min:1|max:5',
        ]);

        
        $review = ProductReview::whereId($id)->first();
        if (!$review) {
            # code...
        } else {
            $review->message = $request->message;
            $review->rate = $request->rate;
            $review->save();

            return redirect()->back()->with('success', 'Review Updated');
        }
        
        

    }

    public function destroy($id){
        $review = ProductReview::whereId($id)->first();
        $review->destroy();
    }
}
