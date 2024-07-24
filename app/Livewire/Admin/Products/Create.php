<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $categories = Category::get();
        return view('livewire.admin.products.create', ['categories' => $categories]);
    }
}
