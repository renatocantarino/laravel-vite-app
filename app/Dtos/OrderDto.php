<?php

namespace App\Dtos;

use App\Models\Product\Order;


class OrderDto
{

    public function __construct(

    ) {

    }


    public static function fromModel(Order $order): self
    {



    }

    public static function toModel(OrderDto $orderDto): Order
    {
    }
}
