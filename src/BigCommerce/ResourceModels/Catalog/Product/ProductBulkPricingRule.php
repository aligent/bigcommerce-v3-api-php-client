<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;


use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductBulkPricingRule extends ResourceModel
{
    const TYPE__PRICE   = 'price';
    const TYPE__PERCENT = 'percent';
    const TYPE__FIXED   = 'fixed';

    public ?int $id;
    public int $quantity_min;
    public int $quantity_max;
    public string $type;
    public int $amount;
}
