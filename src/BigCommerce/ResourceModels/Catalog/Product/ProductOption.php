<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductOption extends ResourceModel
{
    public int $id;
    public int $product_id;
    public string $name;
    public string $display_name;
    public string $type;
    public array $option_values;
    public array $config;
}
