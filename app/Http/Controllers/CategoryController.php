<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show(Category $category) : View {
        $args = [
            'categories' => Category::all(),
            'title' => $category->name,
            'posts' => $category->posts->load('author', 'category')
        ];

        return view('category', $args);
    }
}
