<?php

namespace App\Services\Product;

use App\Dtos\CategoryDto;
use App\Repositories\Product\ICategoryRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection; 


class CategoryService implements ICategoryService
{
    protected ICategoryRepository $repository;

    public function __construct(ICategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
       return Cache::remember(
        key: 'categories_home',
        ttl: 3600,
        callback: fn (): Collection => $this->repository->getAll()            
            ->map(fn ($category) => CategoryDTO::fromModel($category))
            ->values() 
    );
    }
}
