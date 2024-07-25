<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {   
        $categories = Category::with('products')->latest()->get();

        return view('category', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}
