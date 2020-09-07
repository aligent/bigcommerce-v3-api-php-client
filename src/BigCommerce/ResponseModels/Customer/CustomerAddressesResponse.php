<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAddress;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAddressesResponse extends PaginatedResponse
{
    /**
     * @return CustomerAddress[]
     */
    public function getAddresses(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomerAddress::class;
    }
}
