<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\IOrderService;
use App\Services\Product\ICartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{

    protected IOrderService $orderService;
    protected ICartService $cartService;


    public function __construct(
        IOrderService $orderService,
        ICartService $cartService

    ) {

        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    public function start(Request $request)
    {

        $createdOrder = $this->orderService->create($request);
        if (!$createdOrder) {
            throw new \Exception("Error creating order");
        }

        $this->cartService->checkout($request->cart_id);
        return Redirect::route('cart.pay');
    }
}