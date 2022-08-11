<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ProductModifierValueAdjuster extends ResourceModel
{
    public ?PriceAdjuster $price;
    public ?WeightAdjuster $weight;
    public string $image_url;
    public object $purchasing_disabled;

    protected function beforeBuildObject(): void
    {
        $this->buildPropertyObject('price', PriceAdjuster::class);
        $this->buildPropertyObject('weight', WeightAdjuster::class);
    }
}
