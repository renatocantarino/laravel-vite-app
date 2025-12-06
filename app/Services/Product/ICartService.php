<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Dtos\CartItemDto;
use App\Dtos\CartDto;


interface ICartService
{
    public function create(Request $request): CartDto;

    public function addItem($cartId, Request $request): CartItemDto;

    public function getByUserIdWithItems(int $userId): CartDto;

    public function countByUserId(int $userId): int;

    public function remove(int $userId, string $idProduct): bool;

    //public function checkout(CartDto $cart): CartDto;
}
