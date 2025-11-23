<?php

namespace App\Services\Product;

use Illuminate\Database\Eloquent\Collection;

interface ICategoryService
{

    public function getAll(): Collection;
}
