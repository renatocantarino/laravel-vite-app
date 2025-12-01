<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Collection;

interface ICategoryRepository
{
    public function getAll(): Collection;
}
