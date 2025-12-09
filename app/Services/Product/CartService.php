<?php

namespace App\Services\Product;

use App\Models\Product\CartItem;
use App\Dtos\CartDto;
use App\Dtos\CartItemDto;
use App\Repositories\Product\ICartRepository;
use App\Repositories\Product\ICartItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class CartService implements ICartService
{
    protected ICartRepository $cartRepository;
    protected ICartItemRepository $cartItemRepository;

    public function __construct(
        ICartRepository $cartRepository,
        ICartItemRepository $cartItemRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function create(Request $request): CartDto
    {
        $cartRequest = new CartDto(
            id: null,
            user_id: $request->user_id,
            subtotal: $request->qty * $request->price,
            tax: $request->tax ?? 0,
            status: 'open'
        );

        $cart = CartDto::toModel($cartRequest);

        $cartCreated = $this->cartRepository->create($cart);
        return CartDto::fromModel($cartCreated);
    }

    public function addItem($cartId, Request $request): CartItemDto
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



        $itemAdded = $this->cartItemRepository->addItem($cartItem);
        $this->cartRepository->updateCartTotal($cartId);

        return CartItemDto::fromModel($itemAdded);

    }

    public function getByUserIdWithItems(int $userId): CartDto
    {
        $cartWithItens = $this->cartRepository->getByUserIdWithItems($userId);
        return CartDto::fromModel($cartWithItens);
    }

    public function countByUserId(int $userId): int
    {
        return $this->cartRepository->countByUserId($userId);
    }

    public function remove(int $userId, string $idProduct): bool
    {

        $cartOpen = $this->cartRepository->getCartOpenById($userId);
        if (!$cartOpen) {
            throw new \InvalidArgumentException("No open cart found for user ID: $userId");
        }


        $deleted = $this->cartItemRepository->removeItem($cartOpen->cart_id, $idProduct);
        $this->cartRepository->updateCartTotal($cartOpen->cart_id);

        return $deleted;
    }

    public function checkout(string $cartId): bool
    {
        return $this->cartRepository->checkout($cartId);
    }
}
