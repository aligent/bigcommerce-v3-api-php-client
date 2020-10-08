<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class RefundQuote extends ResourceModel
{
    public int $order_id;
    public float $total_refund_amount;
    public float $total_refund_tax_amount;
    public float $rounding;
    public float $adjustment;
    public bool $tax_inclusive;
    public array $refund_methods;
}
