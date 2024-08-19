<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeSetting;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $bestProducts = Product::find(OrderLine::selectRaw('product_id,sum(quantity) as most_products')
            ->groupBy('product_id')
            ->orderByDesc('most_products')
            ->limit(8 * 4)
            ->pluck('product_id'));

        $latestProducts = Product::latest()->limit(8 * 3)->get();
        $featuredProducts = Product::latest()->get()->where('is_featured', true);
        $categories = Category::has('products', '>', 5)->latest()->limit(6)->get();

        $homeOffers = HomeSetting::where('key', 'home_offers')->first()->json_value;
        $homeOffers = array_map(function ($offer) {
            $offer['product'] = Product::with('media')->find($offer['product']);
            return $offer;
        }, $homeOffers);

        $homeFirstBanner = HomeSetting::where('key', 'home_first_banner')->first()->json_value;
        $homeFirstBanner = array_map(function ($banner) {
            $banner['product'] = Product::with('media')->find($banner['product']);
            return $banner;
        }, $homeFirstBanner);

        return view('index', [
            'bestProducts' => $bestProducts,
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'homeOffers' => $homeOffers,
            'homeFirstBanner' => $homeFirstBanner,
        ]);
    }
}
