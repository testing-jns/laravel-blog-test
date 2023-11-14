<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index() : View {
        $args = [
            'posts' => Post::recentPosts(),
            'categories' => Category::all()
        ];
        
        return view('posts', $args);
    }

    public function show(Post $post) : View {
        $args = [
            'post' => $post->load('author', 'category')
        ];
        
        return view('post', $args);
    }
}
