<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryProductsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {   
        $categories = Category::with('products')->has('products', '>', 0)->latest()->get();
        $products = $category->products()->paginate(12);
        return view('category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
