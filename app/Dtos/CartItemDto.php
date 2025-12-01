<?php

namespace App\Dtos;

use App\Models\Product\CartItem;

class CartItemDto
{
    public string $id;
    public string $cart_id;
    public string $prod_id;
    public int $qty;
    public float $price;

    public function __construct(
        string $id,
        string $cart_id,
        string $prod_id,
        int $qty,
        float $price
    ) {
        $this->id = $id;
        $this->cart_id = $cart_id;
        $this->prod_id = $prod_id;
        $this->qty = $qty;
        $this->price = $price;
    }

    public static function fromModel(CartItem $item): self
    {
        
        return new self(
            id: $item->cart_item_id, // ou $item->id, dependendo da coluna
            cart_id: $item->cart_id,
            prod_id: $item->prod_id,
            qty: $item->qty,
            price: $item->price
        );
    }

    public static function toModel(CartItemDto $itemDto): CartItem
    {
        return new CartItem([
            'cart_item_id' => $itemDto->id,
            'cart_id' => $itemDto->cart_id,
            'prod_id' => $itemDto->prod_id,
            'qty' => $itemDto->qty,
            'price' => $itemDto->price,
            'subtotal' => $itemDto->qty * $itemDto->price,
        ]);
    }
}