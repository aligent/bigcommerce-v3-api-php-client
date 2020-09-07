<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAttribute;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAttributesResponse extends PaginatedResponse
{
    /**
     * @return CustomerAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomerAttribute::class;
    }
}
