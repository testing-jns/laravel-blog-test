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

        $perPage = 6;
        $path = $request->getUriForPath('') . $request->getPathInfo();

        $args = [
            'posts' => Post::paginate($posts->get(), $perPage)->withPath($path),
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
