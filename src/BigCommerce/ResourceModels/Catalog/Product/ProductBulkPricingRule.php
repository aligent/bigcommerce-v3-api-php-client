<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductBulkPricingRule extends ResourceModel
{
    public const TYPE__PRICE   = 'price';
    public const TYPE__PERCENT = 'percent';
    public const TYPE__FIXED   = 'fixed';

    public ?int $id;
    public int $quantity_min;
    public int $quantity_max;
    public string $type;
    public float $amount;
}
