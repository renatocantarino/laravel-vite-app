<?php

namespace App\Repositories\Product;

use App\Models\Product\Order;
use Illuminate\Database\Eloquent\Collection;


class OrdersRepository implements IOrdersRepository
{
    public function create(Order $order): Order
    {

        $order->save();
        return $order->fresh();
    }
    public function findById(int $id): Order
    {
        return Order::where("id", $id)->first();
    }
    public function findByUserId(int $userId): Order
    {
        return Order::whereHas('cart', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->firstOrFail();
    }


    public function getAll(): Collection
    {
        return Order::all();
    }


}