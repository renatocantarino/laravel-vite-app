<?php

namespace App\Services\Product;

class CartService implements ICartService
{
    protected ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add($cart): Cart
    {
        return $this->cartRepository->add($cart);
    }
}
