<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(Request $request) : View {
        $posts = Post::recent(useRawBuilderQuery: true);
        
        if ($request->filled('category')) {
            $posts->searchCategory(request('category'));
        }

        if ($request->filled('search')) {
            $posts->searchTitle(request('search'));
        }

        $args = [
            'posts' => Post::paginate($posts->get(), 4)->withPath('/posts'),
            'categories' => Category::all()
        ];
        
        return view('blog.posts', $args);
    }

    public function show(Post $post) : View {
        $args = [
            'post' => $post->load('author', 'category')
        ];
        
        return view('blog.post', $args);
    }
}
