<?php

namespace App\Repositories\Product;


use App\Models\Product\Order;
use Illuminate\Database\Eloquent\Collection;


interface IOrdersRepository
{
    public function create(Order $order): Order;
    public function findById(int $id): Order;
    public function findByUserId(int $userId): Order;
    public function getAll(): Collection;
}
