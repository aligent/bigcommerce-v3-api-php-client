<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOptionValue;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductOptionValueResponse extends SingleResourceResponse
{
    private ProductOptionValue $optionValue;

    public function getOptionValue(): ProductOptionValue
    {
        return $this->optionValue;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->optionValue = new ProductOptionValue($rawData);
    }
}
