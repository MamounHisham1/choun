<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $bestProducts = Product::find(OrderLine::selectRaw('product_id,sum(quantity) as most_products')
        ->groupBy('product_id')
        ->orderByDesc('most_products')
        ->limit(8*4)
        ->pluck('product_id'));
        $latestProducts = Product::latest()->limit(8 * 3)->get();
        $featuredProducts = Product::latest()->get()->where('is_featured', true);
        $categories = Category::has('products', '>', 5)->latest()->limit(6)->get();

        return view('index', [
            'bestProducts' => $bestProducts,
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}
