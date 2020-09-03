<?php

namespace BigCommerce\ApiV3\ResourceModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PriceListRecord extends ResourceModel
{
    public int $price_list_id;
    public int $variant_id;
    public float $price;
    public object $sale_price;
    public object $map_price;
    public float $calculated_price;
    public string $date_created;
    public string $date_modified;
    public string $currency;
    public int $product_id;
    public array $bulk_pricing_tiers;
}
