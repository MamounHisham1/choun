<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeSetting;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
// use Filament\Notifications\Notification;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {   
        $bestProducts = Product::where('is_published', true)->find(OrderLine::selectRaw('product_id,sum(quantity) as most_products')
            ->groupBy('product_id')
            ->orderByDesc('most_products')
            ->limit(8 * 4)
            ->pluck('product_id'));
        $latestProducts = Product::where('is_published', true)->latest()->limit(8 * 3)->get();
        $featuredProducts = Product::where('is_published', true)->latest()->get()->where('is_featured', true);

        $categories = HomeSetting::where('key', 'home_categories')->first()->json_value ?? [];
        $categories = Category::whereIn('id', $categories)->get();

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
        if (collect($homeSecondBanner)->has('category')) {
            $homeSecondBanner['category'] = Category::find($homeSecondBanner['category']);
        }

        return view('index', [
            'bestProducts' => $bestProducts,
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'homeOffers' => $homeOffers,
            'homeFirstBanner' => $homeFirstBanner,
            'homeSecondBanner' => $homeSecondBanner,
        ]);
    }
}
