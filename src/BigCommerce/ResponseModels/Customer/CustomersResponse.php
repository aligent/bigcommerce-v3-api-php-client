<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use stdClass;

class CustomersResponse extends PaginatedResponse
{
    /**
     * @return Customer[]
     */
    public function getCustomers(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Customer::class;
    }
}
