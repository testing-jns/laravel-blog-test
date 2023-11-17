<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index() : View {
        $posts = Post::recent(useRawBuilderQuery: true);
        
        if (request()->filled('category')) {
            $posts->searchCategory(request('category'));
        }

        if (request()->filled('search')) {
            $posts->searchTitle(request('search'));
        }

        $args = [
            // 'posts' => $posts->get(),
            'posts' => collect([]),
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
