<?php

namespace App\Services\Product;
use App\Dtos\OrderDto;
use App\Repositories\Product\IOrdersRepository;
use Illuminate\Http\Request;
use App\Models\Product\Order;

class OrderService implements IOrderService
{

    protected IOrdersRepository $repository;
    public function __construct(IOrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request): Order
    {

        return $this->repository->create(OrderDto::toModel());

    }
}