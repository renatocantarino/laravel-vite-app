<?php

namespace App\Repositories\Product;

use App\Models\Product\CartItem;

interface ICartItemRepository
{
    public function addItem(CartItem $item): CartItem;
    public function removeItem(string $cartId, string $itemId): bool;    
}
