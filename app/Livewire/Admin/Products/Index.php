<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public ?int $maxPrice = null;
    public ?int $perPage = null;
    public function render()
    {
        $products = Product::latest()
            ->when($this->maxPrice, fn($query) => $query->where('price', '<=', $this->maxPrice))
            ->paginate($this->perPage ?? 10);
        return view('livewire.admin.products.index', [
            'products' => $products
        ]);
    }
}
