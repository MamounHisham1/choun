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

        $categories = HomeSetting::where('key', 'home_categories')->first()->json_value ?? [];
        $categories = array_map(function ($category) {
            $category = Category::find($category);
            return $category;
        }, $categories);

        $homeOffers = HomeSetting::where('key', 'home_offers')->first()->json_value ?? [];
        $homeOffers = array_map(function ($offer) {
            $offer['product'] = Product::with('media')->find($offer['product']);
            return $offer;
        }, $homeOffers);

        $homeFirstBanner = HomeSetting::where('key', 'home_first_banner')->first()->json_value ?? [];
        $homeFirstBanner = array_map(function ($banner) {
            $banner['product'] = Product::with('media')->find($banner['product']);
            return $banner;
        }, $homeFirstBanner);

        $homeSecondBanner = HomeSetting::where('key', 'home_second_banner')->first()->json_value ?? [];
        if(collect($homeSecondBanner)->has('category')) {
            Category::find($homeSecondBanner['category']);
        }
        $homeSecondBanner['category'] = Category::find($homeSecondBanner['category']);

        return view('index', [
            'bestProducts' => $bestProducts,
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'homeOffers' => $homeOffers,
            'homeFirstBanner' => $homeFirstBanner,
            'homeSecondBanner' => $homeSecondBanner,0
        ]);
    }
}
