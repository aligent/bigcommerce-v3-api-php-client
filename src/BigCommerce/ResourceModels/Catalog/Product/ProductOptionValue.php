<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductOptionValue extends ResourceModel
{
    public bool $is_default;
    public string $label;
    public int $sort_order;
    public ?object $value_data;
    public int $id;
}
