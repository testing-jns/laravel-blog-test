<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() : View {

        // dd(Post::mostLiked()->get()->first()->id);


        $args = [
            'categories' => Category::all(),
            'mostLikedPosts' => Post::mostLiked()->get()->first(), // entah besok satu atau lebih
            'trendingPosts' => Post::trending()->get(),
            'popularPosts' => Post::popular()->get()->first(), // entah besok satu atau lebih
            'recentPosts' => Post::recent()->get()
        ];
        
        return view('home', $args);
    }
}
