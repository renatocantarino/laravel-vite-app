<?php

namespace App\Dtos;

use App\Models\Product\Cart;

class CartDto
{
    public function __construct(
        public ?string $id,
        public int $user_id,
        public float $subtotal,
        public string $status,
        public float $tax = 0.0,
        public ?float $cartTotal = null,
        public array $cartItems = []
    ) {     }



    public static function fromModel(Cart $cart): self
    {
        $cartItemsDto = $cart->cartItems->map(
            fn($item) => CartItemDto::fromModel($item)
        )->toArray();

        $tax_cart = $cart->subtotal * 0.2;
        $orderTotal = $cart->subtotal + $tax_cart;

        return new self(
            id: $cart->cart_id,
            user_id: $cart->user_id,
            subtotal: $cart->subtotal,
            status: $cart->status,
            tax: $tax_cart,
            cartTotal: $orderTotal,
            cartItems: $cartItemsDto
        );
    }

    public static function toModel(CartDto $cartDto): Cart
    {
        return new Cart([
            'cart_id' => $cartDto->id,
            'user_id' => $cartDto->user_id,
            'subtotal' => $cartDto->subtotal,
            'tax' => $cartDto->tax,
            'status' => $cartDto->status,
        ]);
    }

    /**
     * Convert to array representation
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'cartTotal' => $this->cartTotal,
            'status' => $this->status,
            'cartItems' => $this->cartItems,
        ];
    }
}