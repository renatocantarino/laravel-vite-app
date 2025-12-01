<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;
use App\Models\Product\CartItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

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
    }  
    else {        
        $item->save();
    }


    $this->updateCartTotal($item->cart_id);    
    return $item->fresh();
}


      private function updateCartTotal($cartId)
    {
        $total = CartItem::where('cart_id', $cartId)->sum('subtotal');        
        Cart::where('cart_id', $cartId)->update(['subtotal' => $total]);
    }

    public function getByUserIdWithItems(int $userId): Collection
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


    // public function remove(int $id): bool
    // {
    //     return Cart::where('id', $id)->delete() > 0;
    // }

    // public function checkout(Cart $cart): Cart
    // {
    //     $this->update($cart->id, ['status' => 'closed']);
    //     $cart->refresh();
    //     return $cart;
    // }

    // public function update(int $id, array $data): bool
    // {
    //     $affected = Cart::where('id', $id)->update($data);
    //     return $affected > 0;
    // }
}