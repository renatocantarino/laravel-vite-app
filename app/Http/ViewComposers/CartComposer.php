<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\Product\ICartService;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    protected $cartService;

    public function __construct(ICartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function compose(View $view)
    {
        $countCartItems = 0;
        $userName = '';

        if (Auth::check()) {
            $userId = Auth::id();            
            $userName = Auth::user()->name;

            $countCartItems = $this->cartService->countByUserId($userId);
        }

        $view->with([
            'countCartItems' => $countCartItems,
            'userName' => $userName
        ]);
    }
}
