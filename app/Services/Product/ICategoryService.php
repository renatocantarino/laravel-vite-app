<?php

namespace App\Services\Product;

use Illuminate\Support\Collection; 

interface ICategoryService
{
    public function getAll(): Collection;
}
