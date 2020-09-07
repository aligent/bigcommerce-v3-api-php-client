<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifier;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ModifiersResponse extends PaginatedResponse
{
    /**
     * @return ProductModifier[]
     */
    public function getProductModifiers(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductModifier::class;
    }
}
