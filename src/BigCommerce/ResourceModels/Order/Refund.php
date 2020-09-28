<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Refund extends ResourceModel
{
    public int $id;
    public int $order_id;
    public int $user_id;
    public string $created;
    public string $reason;
    public float $total_amount;
    public float $total_tax;
    /**
     * @var OrderRefundItem[]
     */
    public array $items;
    public array $payments;

    public function __construct(?stdClass $optionObject = null)
    {
        $this->items = array_map(fn($i) => new OrderRefundItem($i), $optionObject->items);
        unset($optionObject->items);
        parent::__construct($optionObject);
    }
}
