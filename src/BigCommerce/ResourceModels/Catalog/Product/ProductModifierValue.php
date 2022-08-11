<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductModifierValue extends ResourceModel
{
    public int $id;
    public int $option_id;
    public ?int $productId;
    public string $label;
    public bool $is_default = false;
    public int $sort_order;
    public ?ProductModifierValueAdjuster $adjusters;
    /**
     * Extra data describing the value, based on the type of option or modifier with which the value is associated.
     * The swatch type option can accept an array of colors, with up to three hexidecimal color keys; or an image_url,
     * which is a full image URL path including protocol. The product list type option requires a product_id.
     * The checkbox type option requires a boolean flag, called checked_value, to determine which value is considered
     * to be the checked state. If no data is available, returns null.
     */
    public ?ProductModifierValueData $value_data;

    protected function beforeBuildObject(): void
    {
        $this->buildPropertyObject('adjusters', ProductModifierValueAdjuster::class);
        $this->buildPropertyObject('value_data', ProductModifierValueData::class);
    }

    public function addPriceAdjuster(PriceAdjuster $priceAdjuster)
    {
        $this->adjusters = new ProductModifierValueAdjuster();
        $this->adjusters->price = $priceAdjuster;
    }
}
