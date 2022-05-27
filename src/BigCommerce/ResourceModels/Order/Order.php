<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

class Order
{
    public function __construct(public int $id, public string $is_recurring)
    {
    }
}
