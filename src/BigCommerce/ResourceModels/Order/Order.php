<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

class Order
{
    public int $id;
    public bool $is_recurring;

    public function __construct(int $id, string $is_recurring)
    {
        $this->id = $id;
        $this->is_recurring = $is_recurring;
    }
}
