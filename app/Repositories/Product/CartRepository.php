<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;
use App\Models\Product\CartItem;

class CartRepository implements ICartRepository
{
    public function create(Cart $cart): Cart
    {
        $existingCart = $this->getCartOpenById($cart->user_id);

        if ($existingCart) {
            return $existingCart;
        }

        $cart->save();
        return $cart->fresh();
    }

    public function updateCartTotal($cartId): void
    {
        $total = CartItem::where('cart_id', $cartId)->sum('subtotal');        
        Cart::where('cart_id', $cartId)->update(['subtotal' => $total]);
    }

    public function getByUserIdWithItems(int $userId): Cart
    {
        return Cart::where('user_id', $userId)
            ->where('status', 'open')
            ->with('cartItems')
            ->first();
    }

    public function countByUserId(int $userId): int
    {
        return CartItem::join('cart', 'cartItem.cart_id', '=', 'cart.cart_id')
            ->where('cart.user_id', $userId)
            ->where('cart.status', 'open')
            ->count();
    }

    public function getCartOpenById(int $userId): ?Cart
    {
        return Cart::where('user_id', $userId)
            ->where('status', 'open')
            ->first();
    }


    public function checkout(string $cartId): bool
    {
        $this->update($cartId, ['status' => 'closed']);
        return true;        
    }

}