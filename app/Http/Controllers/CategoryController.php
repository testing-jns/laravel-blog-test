<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    // public function show(Category $category) : View {
    //     $args = [
    //         'categories' => Category::all(),
    //         'title' => $category->name,
    //         'posts' => $category->posts->load('author', 'category')
    //     ];

    //     return view('category', $args);
    // }

    public function show(string $categoryName) : View {
        $categories = Category::all();
        $category = $categories->where('slug', '=', $categoryName)->first();

        $args = [
            'categories' => $categories,
            'title' => $category->name,
            'posts' => Post::recent()->where('category_id', '=', $category->id)
        ];

        return view('category', $args);
    }
}
