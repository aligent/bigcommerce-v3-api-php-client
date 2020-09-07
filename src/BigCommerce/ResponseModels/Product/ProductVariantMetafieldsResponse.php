<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariantMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVariantMetafieldsResponse extends PaginatedResponse
{
    /**
     * @return ProductVariantMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductVariantMetafield::class;
    }
}
