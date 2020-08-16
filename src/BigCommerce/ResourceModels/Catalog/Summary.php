<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Summary extends ResourceModel
{
    public int $inventory_count;
    public int $variant_count;
    public float $inventory_value;
    public float $highest_variant_price;
    public float $average_variant_price;
    public float $lowest_variant_price;
    public string $oldest_variant_date;
    public string $newest_variant_date;
    public int $primary_category_id;
    public string $primary_category_name;
}
