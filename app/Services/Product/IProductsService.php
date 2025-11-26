<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

interface IProductsService
{
    public function getByCategory($id, $take): Collection;
    public function getById($id): ?Product;
    public function getRelatedProducts(Product $product): Collection;
    public function getAll($take): Collection;    
}
