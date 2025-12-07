<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;
use App\Models\Product\CartItem;

class CartItemRepository implements ICartItemRepository
{


    public function addItem(CartItem $item): CartItem
    {

        $existingItem = CartItem::where('cart_id', $item->cart_id)
            ->where('prod_id', $item->prod_id)
            ->first();

        if ($existingItem) {
            $existingItem->qty += $item->qty;
            $existingItem->subtotal = $existingItem->price * $existingItem->qty;
            $existingItem->save();

            $item = $existingItem;
        } else {
            $item->save();
        }

        return $item->fresh();
    }

    public function removeItem(string $cartId, string $itemId): bool
    {
        return CartItem::where('cart_item_id', $itemId)
            ->where('cart_id', $cartId)
            ->delete() > 0;
    }

}