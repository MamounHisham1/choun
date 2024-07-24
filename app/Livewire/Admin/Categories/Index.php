<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $categories = Category::latest()->paginate(3);
        return view('livewire.admin.categories.index', [
            'categories' => $categories
        ]);
    }
}
