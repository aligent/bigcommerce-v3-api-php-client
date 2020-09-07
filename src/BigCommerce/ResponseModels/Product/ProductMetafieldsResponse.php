<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductMetafieldsResponse extends PaginatedResponse
{
    /**
     * @return ProductMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductMetafield::class;
    }
}
