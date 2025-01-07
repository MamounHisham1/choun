<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $blogs = Blog::where('is_published', true)->paginate(10);
        $categories = Category::all();
        return view('blog', [
            'blogs' => $blogs,
            'categories' => $categories
        ]);
    }

    public function show(Blog $blog)
    {
        return view('show-blog', [
            'blog' => $blog
        ]);
    }
}
