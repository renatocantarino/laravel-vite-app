<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductsRepository implements IProductRepository
{

    public function getByCategory($id): Collection
    {
        return Product::select()
            ->where('category_id', $id)
            ->orderBy('name', 'asc')
            ->get();


    }

    public function getById($id): ?Product
    {
        return Product::where("id",$id)->first();
    }
}
