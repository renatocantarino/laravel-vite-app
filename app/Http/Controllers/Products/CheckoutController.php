<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\IOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{

    protected IOrderService $orderService;
    public function __construct(
        IOrderService $orderService,

    ) {

        $this->orderService = $orderService;
    }


    public function start(Request $request)
    {

        $createdOrder = $this->orderService->create($request);
        if (!$createdOrder) {
            throw new \Exception("Error creating order");
        }
        
        return Redirect::route('cart.pay');
    }
}