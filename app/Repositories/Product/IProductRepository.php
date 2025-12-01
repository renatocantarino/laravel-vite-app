<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use App\Models\Product\Cart;
use Illuminate\Database\Eloquent\Collection;

interface  IProductRepository
{
    public function getByCategory($id,$take): Collection;

    public function getById($id): ?Product;
}





