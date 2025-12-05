<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\ICartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{

    protected ICartService $cartService;

    public function __construct(ICartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        
        $request->merge(['user_id' =>$this->getLoggerUserInfo()['id']]);

        $cartCreated = $this->cartService->create($request);        
        $itemAdded = $this->cartService->addItem($cartCreated->id, $request);      

        return Redirect::route('single.product',$request->prod_id)->with(['success' => 'Product added to cart  successfully']);
    }

    public function viewCart()
    {
        $cartProducts = $this->cartService->getByUserIdWithItems($this->getLoggerUserInfo()['id']);        
        return view('cart.view', compact('cartProducts'));
    }

    public function removeFromCart(int $idProduct)
    {        
        $this->cartService->remove($this->getLoggerUserInfo()['id'],$idProduct);
        return Redirect::route('cart.view')->with(['success' => 'Product removed from cart  successfully']);
    }

    public function checkout(Request $request)
    {
        $userInfo = $this->getLoggerUserInfo();

        $cartProducts = $this->cartService->getByUserIdWithItems($userInfo['id']);       
        return view('cart.checkout', compact('cartProducts', 'userInfo'));
    }
}
