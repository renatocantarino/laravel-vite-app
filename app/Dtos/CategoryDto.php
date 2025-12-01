<?php

namespace App\Dtos;

use App\Models\Product\Category;

class CategoryDto
{
    public int $id;
    public string $name;
    public ?string $image = null;
    public ?string $icon = null;

    public function __construct(
        int $id,
        string $name,
        ?string $image = null,
        ?string $icon = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->icon = $icon;
    }

    public static function fromModel(Category $category): self
    {
        return new self(
            id: $category->id,
            name: $category->name,
            image: $category->image,
            icon: $category->icon,
        );
    }
}
