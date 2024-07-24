<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'images' => ['required'],
            'images.*' => [File::types(['png', 'jpg', 'jpeg', 'webp'])]
        ]);

        $product = Product::create($request->except('images', 'tags'));

        $images = $request->file('images');

        foreach ($images as $image) {
            $path = $image->store('images', 'public');
            Image::create([
                'product_id' => $product->id,
                'name' => $path,
            ]);
        }
        session()->flash('message', 'Product created successfully');

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'images' => $product->images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->except('images', 'tags'));

        if ($request->file('images')) {
            $images = $request->file('images');
            $product->images()->delete();

            foreach ($images as $image) {
                $path = $image->store('images', 'public');
                Image::create([
                    'product_id' => $product->id,
                    'name' => $path,
                ]);
            }
        }

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products');
    }
}
