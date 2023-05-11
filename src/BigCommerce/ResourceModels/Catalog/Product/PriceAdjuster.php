<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PriceAdjuster extends ResourceModel
{
    public const ADJUSTER_RELATIVE = 'relative';
    public const ADJUSTER_FIXED    = 'fixed';

    public string $adjuster = self::ADJUSTER_FIXED;
    public float $adjuster_value;
}
