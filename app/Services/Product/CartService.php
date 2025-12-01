<?php

namespace App\Services\Product;

use App\Models\Product\Cart;
use App\Models\Product\CartItem;
use App\Dtos\CartDto;
use App\Dtos\CartItemDto;
use App\Repositories\Product\ICartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class CartService implements ICartService
{
    protected ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function create(Request $request): CartDto
    {

        $cartRequest = new Cart([                       
            "user_id" => $request->user_id,
            "subtotal" => $request->qty * $request->price,
            "status" => 'open'
        ]);

        $cartCreated = $this->cartRepository->create($cartRequest);   
        return CartDto::fromModel($cartCreated);
    }

     public function addItem($cartId,Request  $request): CartItemDto
     {

          $cartItem = new CartItem([
            "cart_id" => $cartId,
            "name" => $request->name,
            "price" => $request->price,
            "qty" => $request->qty,
            "image" => $request->image,
            "prod_id" => $request->prod_id,
            "subtotal" => $request->qty * $request->price
        ]);
                
        Cache::forget("cart_count_user_{$request->userId}");

        $itemAdded= $this->cartRepository->addItem($cartItem);
        return CartItemDto::fromModel($itemAdded);
     }

    public function getByUserIdWithItems(int $userId): Collection
    {
        return $this->cartRepository->getByUserId($userId)
            ->map(fn ($cart) => CartDto::fromModel($cart))
            ->values();
    }

    public function countByUserId(int $userId): int
    {
        return $this->cartRepository->countByUserId($userId);
    }
    // public function remove(int $id): bool
    // {
    //     return $this->cartRepository->remove($id);
    // }
    // public function checkout(CartDto $cartDto): CartDto
    // {                
    //    $closedCart = CartDto::toModel($cartDto);
    //    $closedCart = $this->cartRepository->close($closedCart);
    //    return CartDto::fromModel($closedCart);
    // }

}
