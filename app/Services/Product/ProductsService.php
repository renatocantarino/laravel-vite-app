<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Repositories\Product\IProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;


class ProductsService implements IProductsService
{
    protected IProductRepository $repository;
    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getByCategory($id): Collection
    {
        return Cache::remember('prod_category_'.$id, 3600, function() use ($id) {
            return $this->repository->getByCategory($id);
        });
    }

    public function getById($id): ?Product
    {
        return Cache::remember('prod_'.$id,1, function() use ($id) {
            return $this->repository->getById($id);
        });
    }

    public function getRelatedProducts(Product $product): Collection
    {
            return $this->repository->getRelatedProducts($product);
    }
    
    public function getAll($take): Collection
    {       
        return $this->repository->getAll($take);        
    }
}
