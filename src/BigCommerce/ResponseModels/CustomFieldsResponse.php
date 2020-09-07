<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\CustomField;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomFieldsResponse extends PaginatedResponse
{
    /**
     * @return CustomField[]
     */
    public function getCustomFields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomField::class;
    }
}
