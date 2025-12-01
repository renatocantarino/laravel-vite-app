<?php

namespace App\Dtos;

use App\Models\Product\Product;

class ProductDto
{
    public int $id;
    public string $name;
    public string $image;
    public string $price;
    public string $description;
    public int $category_id;

    public function __construct(
        int     $id,
        string  $name,
        string $image,
        string $description,
        string $price,
        int    $category_id
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }

    public static function fromModel(Product $product): self
    {
        return new self(
            id: $product->id,
            name: $product->name,
            image: $product->image,
            description: $product->description,
            price: $product->price,
            category_id: $product->category_id,
        );
    }


    public static function toModel(ProductDto $product): Product
    {
        return new Product([
            'name' => $product->name,
            'image' => $product->image,
            'description' => $product->description,
            'price' => $product->price,
            'category_id' => $product->category_id,
        ]);
    }


}


