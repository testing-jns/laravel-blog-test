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
            'mostLikedPosts' => Post::mostLiked()->first(), // entah besok satu atau lebih
            'trendingPosts' => Post::trending(),
            'popularPosts' => Post::popular()->first(), // entah besok satu atau lebih
            'recentPosts' => Post::recent()
        ];
        
        return view('home', $args);
    }
}
