<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOptionValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductOptionValuesResponse extends PaginatedResponse
{
    /**
     * @return ProductOptionValue[]
     */
    public function getOptionValues(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductOptionValue::class;
    }
}
