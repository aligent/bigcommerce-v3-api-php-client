<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOptionValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductOptionValuesResponse extends PaginatedResponse
{
    /**
     * @var ProductOptionValue[]
     */
    private array $optionValues;

    /**
     * @return ProductOptionValue[]
     */
    public function getOptionValues(): array
    {
        return $this->optionValues;
    }

    protected function addData(array $data): void
    {
        $this->optionValues = array_map(function (\stdClass $v) {
            return new ProductOptionValue($v);
        }, $data);
    }
}
