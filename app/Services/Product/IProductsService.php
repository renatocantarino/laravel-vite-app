<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

interface IProductsService
{
    public function getByCategory($id): Collection;

    public function getById($id): ?Product;
}
