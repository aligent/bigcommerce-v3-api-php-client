<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerFormFieldValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use stdClass;

class CustomerFormFieldValuesResponse extends PaginatedResponse
{
    /**
     * @return CustomerFormFieldValue[]
     */
    public function getValues(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomerFormFieldValue::class;
    }
}
