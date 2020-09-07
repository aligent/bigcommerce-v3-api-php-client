<?php

namespace BigCommerce\ApiV3\ResponseModels\Brand;

use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\BrandMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class BrandMetafieldsResponse extends PaginatedResponse
{
    /**
     * @return BrandMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return BrandMetafield::class;
    }
}
