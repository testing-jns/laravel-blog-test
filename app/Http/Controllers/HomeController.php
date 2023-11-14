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
        $args = [
            'categories' => Category::all(),
            'mostLikedPosts' => Post::mostLikedPosts(), // entah besok satu atau lebih
            'trendingPosts' => Post::trendingPosts(),
            'popularPosts' => Post::popularPosts(),
            'recentPosts' => Post::recentPosts() // entah besok satu atau lebih
        ];
        
        return view('home', $args);
    }
}
