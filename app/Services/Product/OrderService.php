<?php

namespace App\Services\Product;
use App\Dtos\OrderDto;
use App\Repositories\Product\IOrdersRepository;
use Illuminate\Http\Request;
use App\Models\Product\Order;
use Illuminate\Support\Collection;

class OrderService implements IOrderService
{

    protected IOrdersRepository $repository;
    public function __construct(IOrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request): Order
    {

        $orderRequest = new OrderDto(
            id: null,
            cart_id: $request->cart_id,
            full_name: $request->full_name,
            address: $request->address,
            city: $request->city,
            state: $request->state,
            zipcode: $request->zipcode,
            email: $request->email,
            phone_number: $request->phone_number,
            notes: $request->notes,
            status: 'pending',
        );



        return $this->repository->create(OrderDto::toModel($orderRequest));

    }


    public function getAll(): Collection
    {
        return $this->repository->getAll()
            ->map(fn($order) => OrderDto::fromModel($order))
            ->values();
    }
}