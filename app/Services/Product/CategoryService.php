<?php

namespace App\Services\Product;

use App\Repositories\Product\ICategoryRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements ICategoryService
{
    protected ICategoryRepository $repository;

    public function __construct(ICategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return Cache::remember('categories_home', 3600, function () {
            return $this->repository->getAll();
        });
    }
}
