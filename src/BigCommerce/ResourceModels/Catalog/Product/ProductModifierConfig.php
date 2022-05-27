<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

class ProductModifierConfig
{
    public const PRODUCT_LIST_SHIPPING_BY_WEIGHT = 'weight';

    public function __construct(
        public bool $product_list_adjusts_inventory,
        public bool $product_list_adjusts_pricing,
        public string $product_list_shipping_calc
    ) {
    }
}
