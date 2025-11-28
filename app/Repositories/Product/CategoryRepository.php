<?php

namespace App\Repositories\Product;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements ICategoryRepository
{
    public function getAll(): Collection
    {
        return Category::select('id', 'name', 'image', 'icon')
                        ->orderBy('name', 'asc')
                        ->get();
    }
}

