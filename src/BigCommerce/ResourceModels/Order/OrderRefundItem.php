<?php

namespace BigCommerce\ApiV3\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderRefundItem extends ResourceModel
{
    public const ITEM_TYPE__SHIPPING = 'SHIPPING';
    public const ITEM_TYPE__HANDLING = 'HANDLING';
    public const ITEM_TYPE__PRODUCT = 'PRODUCT';
    public const ITEM_TYPE__GIFT_WRAPPING = 'GIFT_WRAPPING';

    public string $item_type;
    public int $item_id;
    public ?float $amount;
    public ?float $quantity;
    public ?string $reason;
    public ?float $requested_amount;
}
