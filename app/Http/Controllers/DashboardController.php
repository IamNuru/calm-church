<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Donation;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sermon;
use App\Models\SermonCategory;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }


    public function members(){
        $members = User::whereNotIn('role', [''])->get();
        return view('pages.dashboard.list.Members')->with('members', $members);
    }


    public function users(){
        $members = User::whereIn('role', ['','NULL'])->orWhereNull('role')->get();
        return view('pages.dashboard.list.Users')->with('users', $members);
    }


    public function posts(){
        $posts = Post::get();
        return view('pages.dashboard.list.Posts')->with('posts', $posts);
    }


    public function sermons(){
        $sermons = Sermon::get();
        return view('pages.dashboard.list.Sermons')->with('sermons', $sermons);
    }


    public function songs(){
        $songs = Song::get();
        return view('pages.dashboard.list.Songs')->with('songs',$songs);
    }

    public function donations(){
        $donations = Donation::get();
        return view('pages.dashboard.list.Donations')->with('donations', $donations);
    }


    public function parephenials(){
        $pars = Product::get();
        return view('pages.dashboard.list.Parephenials')->with('pars', $pars);
    }


    public function upload(){
        return view('pages.dashboard.Uploads');
    }


    public function addmember(){
        
        return view('pages.dashboard.add.Member');
    }

    public function addpost(){
        $categories = Category::get();

        $data = [
            'categories' => $categories,
        ];
        
        return view('pages.dashboard.add.Post')->with('data', $data);
    }

    public function addsermon(){
        return view('pages.dashboard.add.Sermon');
    }

    public function adddonation(){
        return view('pages.dashboard.add.Donation');
    }

    public function addsong(){
        $categories = Category::get();
        return view('pages.dashboard.add.Song')->with('categories', $categories);
    }

    public function addparephenial(){
        $categories = ProductCategory::get();
        return view('pages.dashboard.add.Parephenial')->with('categories', $categories);
    }


    public function editpost($id){
        $post = Post::whereId($id)->first();
        $categories = Category::get();
        return view('pages.dashboard.update.Post')
            ->with('post', $post)
            ->with('categories', $categories);
    }

    public function editsermon($id){
        $sermon = Sermon::whereId($id)->first();
        return view('pages.dashboard.update.Sermon')
            ->with('sermon', $sermon);
    }


    public function editdonation($id){
        $donation = Donation::whereId($id)->first();
        return view('pages.dashboard.update.Donation')->with('donation',$donation);
    }


    public function editsong($id){
        $song = Song::whereId($id)->first();
        return view('pages.dashboard.update.Song')->with('song', $song);
    }


    public function editparephenial($id){
        $par = Product::whereId($id)->first();
        return view('pages.dashboard.update.Parephenial')->with('par', $par);
    }


    public function edituser($id){
        $user = User::whereId($id)->first();
        return view('pages.dashboard.update.Member')->with('user',$user);
    }
}
