<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

interface IProductRepository
{
    public function getByCategory($id, $take): Collection;

    public function getById($id): ?Product;

    public function getAll($take): Collection;

    public function getRelatedProducts(Product $product): Collection;
}





