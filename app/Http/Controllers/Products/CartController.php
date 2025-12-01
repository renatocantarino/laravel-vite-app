<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\ICartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $userId = Auth::user()->id;
        $request->merge(['user_id' =>$userId]);

        $cartCreated = $this->cartService->create($request);        
        $itemAdded = $this->cartService->addItem($cartCreated->id, $request);      

        return Redirect::route('single.product',$request->prod_id)->with(['success' => 'Product added to cart  successfully']);
    }

    public function viewCart()
    {
        $cartProducts = $this->cartService->getByUserId(Auth::user()->id);
        $sums = $cartProducts->sum('subtotal');


        return view('cart.view', compact('cartProducts', 'sums'));
    }

    public function removeFromCart(int $id)
    {
        $this->cartService->remove($id);
        return Redirect::route('cart.view')->with(['success' => 'Product removed from cart  successfully']);
    }

    public function checkout(Request $request)
    {
        return view('cart.checkout');
    }
}
