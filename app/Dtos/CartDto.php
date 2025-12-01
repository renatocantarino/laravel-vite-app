<?php

namespace App\Dtos;

use App\Models\Product\Cart;

class CartDto
{
    public string $id;        
    public int $user_id;
    public float $subtotal;
    public string $status;  
    public array $cartItems; 

    public function __construct(
        string $id,               
        float $subtotal,
        int $user_id,
        string $status,
        array $cartItems = [] 
    ) {
        $this->id = $id;                
        $this->user_id = $user_id;
        $this->subtotal = $subtotal;
        $this->status = $status;
        $this->cartItems = $cartItems;
    }

    public static function fromModel(Cart $cart): self
    {
        $cartItemsDto = $cart->cartItems->map(fn($item) => CartItemDto::fromModel($item))->toArray();

        return new self
        (
            id: $cart->cart_id,
            user_id: $cart->user_id,
            subtotal: $cart->subtotal,
            status: $cart->status,
            cartItems: $cartItemsDto
        );   
    }

    public static function toModel(CartDto $cartDto): Cart
    {
        $cart = new Cart([
            'cart_id' => $cartDto->id,                        
            'user_id' => $cartDto->user_id,
            'subtotal' => $cartDto->subtotal,
            'status' => $cartDto->status,
        ]);
        
        return $cart;
    }
}