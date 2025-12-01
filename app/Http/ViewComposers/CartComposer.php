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

        if (Auth::check()) {
            $userId = Auth::id();

            // Chave única para o cache do carrinho do usuário
            $cacheKey = "cart_count_user_{$userId}";

            // Obter ou armazenar o valor em cache
            $countCartItems = Cache::remember($cacheKey, 3600, function () use ($userId) {
                return $this->cartService->countByUserId($userId);
            });
        }

        $view->with('countCartItems', $countCartItems);
    }
}
