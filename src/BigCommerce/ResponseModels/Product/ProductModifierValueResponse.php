<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierValue;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductModifierValueResponse extends SingleResourceResponse
{
    private ProductModifierValue $modifierValue;

    public function getModifierValue(): ProductModifierValue
    {
        return $this->modifierValue;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->modifierValue = new ProductModifierValue($rawData);
    }
}
