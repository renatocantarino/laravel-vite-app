<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;
use App\Models\Product\CartItemDto;
use App\Models\Product\CartItem;
use Illuminate\Database\Eloquent\Collection;

interface  ICartRepository
{
    public function create(Cart $cart): Cart;

    public function addItem(CartItem $item): CartItem;

    public function remove(int $idProduct): bool;

    // public function checkout(Cart $cart): Cart;

     public function countByUserId(int $userId): int;

     public function getCartOpenById(int $userId): ?Cart;

     public function getByUserIdWithItems(int $userId): Cart;

    // public function update(int $id, array $data): bool;


}
