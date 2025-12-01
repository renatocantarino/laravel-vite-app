<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductsRepository implements IProductRepository
{

    public function getByCategory($id,$take): Collection
    {
        $query = Product::select()
            ->where('category_id', $id)
            ->orderBy('name', 'asc');

        if($take>0){
            $query->take($take);
        }

         return $query->get();
    }

    public function getAll($take): Collection
    {
        return Product::select()
                        ->orderBy('name', 'desc')
                        ->take($take)
                        ->get();


    }

    public function getById($id): ?Product
    {
        return Product::where("id",$id)->first();
    }
    
    public function getRelatedProducts(Product $product): Collection
    {
            return Product::select()
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->get();
    }
}
