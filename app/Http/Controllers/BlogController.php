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
    public function index()
    {
        $category = request('category');
        $query = Blog::with('category')->latest();

        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        $blogs = $query->paginate(6);
        $categories = Category::all();
        $hasMorePages = $blogs->hasMorePages();

        if (request()->ajax()) {
            return view('components.blog-grid-items', compact('blogs'));
        }

        return view('blog', compact('blogs', 'categories', 'hasMorePages'));
    }

    public function show(Blog $blog)
    {
        return view('show-blog', [
            'blog' => $blog
        ]);
    }

    public function loadMore()
    {
        $category = request('category');
        $query = Blog::with('category')->latest();

        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        $blogs = $query->paginate(6);

        return response()->json([
            'html' => view('components.blog-grid-items', compact('blogs'))->render(),
            'hasMorePages' => $blogs->hasMorePages()
        ]);
    }
}
