<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index() : View | string {
        return "All authors!";
    }

    public function show(Request $request, Author $author) : View {
        $posts = $author->posts->load('author', 'category');
        
        $args = [
            'author' => $author,
            'posts' => Post::paginate($posts, 4)->withPath('/' . $request->path())
        ];
                
        return view('blog.author', $args);
    }
}
