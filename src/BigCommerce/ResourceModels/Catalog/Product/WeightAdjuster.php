<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WeightAdjuster extends ResourceModel
{
    public string $adjuster;
    public float $adjuster_value;
}
