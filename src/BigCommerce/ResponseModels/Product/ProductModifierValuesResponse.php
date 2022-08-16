<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductModifierValuesResponse extends PaginatedResponse
{
    /**
     * @return ProductModifierValue[]
     */
    public function getModifierValues(): array
    {
        return $this->getData();
    }

    protected function addData(array $data): void
    {
        $this->setData(array_map(function (\stdClass $v) {
            return new ProductModifierValue($v);
        }, $data));
    }

    protected function resourceClass(): string
    {
        return ProductModifierValue::class;
    }
}
