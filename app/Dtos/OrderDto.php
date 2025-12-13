<?php

namespace App\Dtos;

use App\Models\Product\Order;

class OrderDto
{

    public function __construct(
        public ?int $id = null,
        public string $cart_id,
        public string $full_name,
        public string $address,
        public string $city,
        public string $state,
        public string $zipcode,
        public string $email,
        public string $phone_number,
        public string $notes,
        public string $status       

    ) {
    }

    public static function fromModel(Order $order): OrderDto
    {
        return new self(
            id: $order->id,
            cart_id: $order->cart_id,
            full_name: $order->full_name,
            address: $order->address,
            city: $order->city,
            state: $order->state,
            zipcode: $order->zipcode,
            email: $order->email,
            phone_number: $order->phone_number,
            notes: $order->notes,
            status: $order->status            
        );

    }

    public static function toModel(OrderDto $orderDto): Order
    {
        $order = new Order([
            "id" => $orderDto->id,
            'cart_id' => $orderDto->cart_id,
            'full_name' => $orderDto->full_name,
            'address' => $orderDto->address,
            'city' => $orderDto->city,
            'state' => $orderDto->state,
            'zipcode' => $orderDto->zipcode,
            'email' => $orderDto->email,
            'phone_number' => $orderDto->phone_number,
            'notes' => $orderDto->notes ?? '',
            'status' => $orderDto->status,
        ]);

        return $order;
    }
}
