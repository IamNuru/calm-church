<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Donation;
use App\Models\Donator;
use App\Models\Partner;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\Sermon;
use App\Models\SermonCategory;
use App\Models\Song;
use App\Models\SongCategory;
use App\Models\Subscriber;
use App\Models\Tag;

class PagesController extends Controller
{
    //returns home page
    public function index(){
        $users = User::get();
        $teams = User::whereIn('role',['pastor'])->get();
        $posts = Post::latest()->get();
        //$sermons = Sermon::get();
        $products = Product::latest()->get();
        $donations = Donation::latest()->get();
        $partners = User::where('role' ,'===', 'partner')->get();

        $data = [
            'users' => $users,
            'posts' => $posts,
            //'sermons' => $sermons,
            'products' => $products,
            'donations' => $donations,
            'partners' => $partners,
            'teams' => $teams,
        ];
        return view('pages.home.index')->with('data', $data);
    }


    //returns about-us page
    public function about(){
        $users = User::get();
        $sermons = Sermon::get();
        $partners = Partner::get();
        $teams = User::whereIn('role',['pastor'])->get();
        $data = [
            'users' => $users,
            'sermons' => $sermons,
            'partners' => $partners,
            'teams' => $teams,
        ];
        return view('pages.About-us')->with('data', $data);
    }


    public function contact(){
        return view('pages.Contact-us');
    }
    

    public function blog(){
        $posts  = Post::with('category')->latest()->paginate(10);
        $r_posts  = Post::take(5)->latest()->get();
        $categories  = Category::get();
        return view('pages.Blog')
                    ->with('posts',$posts)
                    ->with('categories',$categories)
                    ->with('r_posts',$r_posts);
    }


    //returns our-team page
    public function team(){
        return view('pages.Our-team');
    }

    //returns counseling page
    public function counseling(){
        return view('pages.Counseling');
    }


    //returns events page
    public function events(){
        return view('pages.Events');
    }


    //returns shop page
    public function shop(){
        $products = Product::latest()->paginate(10);
        $categories = ProductCategory::orderBy('name','asc')->get();
        $popularProducts = Product::take(5)->latest()->get();
        return view('pages.Shop')
                    ->with('products', $products)
                    ->with('popularProducts', $popularProducts)
                    ->with('categories', $categories);
    }


    //returns donations page
    public function donations(){
        $donations = Donation::where('amount', '>' , 0 )->latest()->paginate(10);
        return view('pages.Donations')->with('donations', $donations);
    }


    //returns music page
    public function songs(){
        $songs = Song::with('category')->latest()->paginate(10);
        return view('pages.Songs')->with('songs', $songs);
    }


    public function sermons(){
       $sermons = Sermon::latest()->paginate(10);
        return view('pages.Sermons')->with('sermons', $sermons);
    }

    
    public function sermonCategories(){
       $sermons = SermonCategory::get();
        return view('pages.Sermon-categories')->with('sermons', $sermons);
    }


    //returns single items
    public function member($id){
        $user = User::whereId($id)->first();
        $sermonCategories = SermonCategory::get();
        return view('pages.single.Member')
                ->with('user', $user)
                ->with('sermonCategories', $sermonCategories);
    }


    public function post($slug){
        $post = Post::whereSlug($slug)->with('category','comments')->first();

        $rel_posts = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name'));
        })->where('id', '!=', $post->id)
            ->take(5)->get();

        $r_posts = Post::whereNotIn('id', [$post->id])->with('category')->take(3)->get();
        $categories = Category::get();
        return view('pages.single.Post')
                    ->with('post', $post)
                    ->with('r_posts', $r_posts)
                    ->with('rel_posts', $rel_posts)
                    ->with('categories', $categories);
    }

    public function song($id, $slug){
        $song = Song::whereId($id)->with('category','tags')->first();
        $r_songs = Song::whereNotIn('id', [$id])->with('category')->take(3)->get();
        $categories = SongCategory::get();
        //$media = $song->getMedia()->where('model_id', $song->id);
        //dd($media);
        return view('pages.single.Song')
                    ->with('song', $song)
                    ->with('r_songs', $r_songs)
                    ->with('categories', $categories);
    }


    public function sermon($slug){
        $sermon = Sermon::where('slug',$slug)->with('sermonMessages')->first();
        //$ser =$sermon->sermonMeassages()->with('user');
        //dd($sermon);
        $sermons = Sermon::get();
        return view('pages.single.Sermon')
                 ->with('sermon', $sermon)
                 ->with('sermons', $sermons);
    }


    public function donation($slug){
        $donation = Donation::where('slug',$slug)->first();
        
        return view('pages.single.Donate')
                 ->with('donation', $donation);
    }

    public function product($slug){
        $product = Product::where('slug',$slug)->with('category')->first();
        $r_products = Product::take(5)->get();
        return view('pages.single.Product')
                 ->with('product', $product)
                 ->with('r_products', $r_products);
    }


    public function checkout(){
        
        return view('pages.single.Checkout');
    }






}
