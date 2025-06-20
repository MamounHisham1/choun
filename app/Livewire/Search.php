<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $searchParams = '';
    public $categories = [];
    public $categoryId = null;
    public $products = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.search', ['products' => $this->products]);
    }

    public function search()
    {
        $this->products = Product::search($this->searchParams)
            ->when($this->categoryId, function ($query) {
                $query->where('category_id', $this->categoryId);
            })->get();
    }
}
