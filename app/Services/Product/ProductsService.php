<?php

namespace App\Services\Product;

use App\Dtos\ProductDto;
use App\Models\Product\Product;
use App\Repositories\Product\IProductRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


class ProductsService implements IProductsService
{
    protected IProductRepository $repository;
    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getByCategory($id, $take=0): Collection
    {
        return Cache::remember('prod_category_'.$id, 3600, function() use ($id, $take) {
            return $this->repository->getByCategory($id,$take)
                ->map(fn ($prod) => ProductDto::fromModel($prod))
                ->values();
        });
    }

    public function getById($id): ?ProductDto
    {
        return Cache::remember('prod_'.$id,1, function() use ($id) {
            $model = $this->repository->getById($id);
            return $model ? ProductDto::fromModel($model) : null;
        });
    }

    public function getRelatedProducts(ProductDto $product): Collection
    {
        $mapped = ProductDto::toModel($product);
        return $this->repository->getRelatedProducts($mapped);
    }

    public function getAll($take): Collection
    {
        return $this->repository->getAll($take)
                    ->map(fn ($prod) => ProductDto::fromModel($prod))
                    ->values();
    }
}
