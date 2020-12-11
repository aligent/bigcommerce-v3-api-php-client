<?php

namespace BigCommerce\ApiV3\ResponseModels\Category;

use BigCommerce\ApiV3\Api\Generic\FetchAllPages;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CategoriesResponse extends PaginatedResponse
{
    use FetchAllPages;

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Category::class;
    }
}
