<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVariantsResponse extends PaginatedResponse
{
    /**
     * @return ProductVariant[]
     */
    public function getProductVariants(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductVariant::class;
    }
}
