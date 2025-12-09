<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;


interface ICartRepository
{
    public function create(Cart $cart): Cart;

    public function checkout(string $cartId): bool;

    public function countByUserId(int $userId): int;

    public function getCartOpenById(int $userId): ?Cart;

    public function getByUserIdWithItems(int $userId): Cart;

    public function updateCartTotal($cartId): void;

}