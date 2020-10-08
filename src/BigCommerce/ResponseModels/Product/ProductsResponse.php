<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\Product;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;

class ProductsResponse extends PaginatedBatchableResponse
{
    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Product::class;
    }
}
