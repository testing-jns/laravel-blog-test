<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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

    public function show(Request $request, string $categoryName) : View | Response {
        $categories = Category::all();
        $category = $categories->where('slug', '=', $categoryName)->first();

        if (empty($category)) {
            return response(view('errors.404'), 404);
        }

        $posts = Post::recent()->where('category_id', '=', $category->id);
        
        $args = [
            'categories' => $categories,
            'title' => $category->name,
            'posts' => Post::paginate($posts, 4)->withPath('/' . $request->path())
        ];

        return view('blog.category', $args);
    }
}
