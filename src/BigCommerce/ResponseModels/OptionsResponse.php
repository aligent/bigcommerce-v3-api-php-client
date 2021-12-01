<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOption;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class OptionsResponse extends PaginatedResponse
{
    /**
     * @return ProductOption[]
     */
    public function getOptions(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductOption::class;
    }
}
