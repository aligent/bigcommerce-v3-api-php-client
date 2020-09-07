<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAttributeValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAttributeValuesResponse extends PaginatedResponse
{
    /**
     * @return CustomerAttributeValue[]
     */
    public function getValues(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomerAttributeValue::class;
    }
}
