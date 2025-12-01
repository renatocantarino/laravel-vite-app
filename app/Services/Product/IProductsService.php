<?php

namespace App\Services\Product;

use App\Dtos\ProductDto;
use Illuminate\Support\Collection;

interface IProductsService
{
    public function getByCategory($id, $take): Collection;
    public function getById($id): ?ProductDto;
    public function getRelatedProducts(ProductDto $product): Collection;
    public function getAll($take): Collection;
}
