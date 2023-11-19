<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index() : View | string {
        return "All authors!";
    }

    public function show(Author $author) : View {
        $args = [
            'author' => $author,
            'posts' => $author->posts->load('author', 'category')
        ];
                
        return view('blog.author', $args);
    }
}
