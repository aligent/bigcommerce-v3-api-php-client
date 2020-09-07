<?php

namespace BigCommerce\ApiV3\ResponseModels\Category;

use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CategoryMetafieldsResponse extends PaginatedResponse
{
    /**
     * @return CategoryMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CategoryMetafield::class;
    }
}
