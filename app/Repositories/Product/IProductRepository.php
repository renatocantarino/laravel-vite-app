<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

interface  IProductRepository
{
    public function getByCategory($id): Collection;

    public function getById($id): ?Product;
}
