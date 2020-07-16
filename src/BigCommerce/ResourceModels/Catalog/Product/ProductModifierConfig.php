<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;


class ProductModifierConfig
{
    const PRODUCT_LIST_SHIPPING_BY_WEIGHT = 'weight';

    public bool $product_list_adjusts_inventory;
    public bool $product_list_adjusts_pricing;
    public string $product_list_shipping_calc;

    public function __construct(bool $product_list_adjusts_inventory,
                                bool $product_list_adjusts_pricing,
                                string $product_list_shipping_calc)
    {
        $this->product_list_adjusts_inventory = $product_list_adjusts_inventory;
        $this->product_list_adjusts_pricing = $product_list_adjusts_pricing;
        $this->product_list_shipping_calc = $product_list_shipping_calc;
    }
}