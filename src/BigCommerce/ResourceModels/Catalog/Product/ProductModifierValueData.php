<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductModifierValueData extends ResourceModel
{
    public ?array $colors;
    public ?string $image_url;
    public ?int $product_id;
    public ?bool $checked_value;
}
