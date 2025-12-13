<?php

namespace App\Services\Product;
use App\Dtos\OrderDto;
use App\Repositories\Product\IOrdersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderService implements IOrderService
{

    protected IOrdersRepository $repository;
    public function __construct(IOrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): OrderDto
    {
        
        $orderRequest = new OrderDto(
            id: null,
            cart_id: $data['cartId'] ?? null,
            full_name: "{$data['userName']} {$data['lastName']}" ?? null,
            address: $data['Address'] ?? null,
            city: $data['city'] ?? null,
            state: $data['country'] ?? null,
            zipcode: $data['zipcode'] ?? null,
            email: $data['email'] ?? null,
            phone_number: $data['phone'] ?? null,
            notes: $data['orderNotes'] ?? null,
            status: $data['status'] ?? 'pending'            
        );
        $orderCreated = $this->repository->create(OrderDto::toModel($orderRequest));
        return OrderDto::fromModel($orderCreated);
    }


    public function getAll(): Collection
    {
        return $this->repository->getAll()
            ->map(fn($order) => OrderDto::fromModel($order))
            ->values();
    }
}