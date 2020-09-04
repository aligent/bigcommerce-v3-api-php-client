<?php

namespace BigCommerce\ApiV3\Customers;

use BigCommerce\ApiV3\ResponseModels\Customer\CustomerAddressesResponse;

class CustomerAddresses extends CustomerApiBase
{
    private const RESOURCE_NAME = 'addresses';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomerAddressesResponse
    {
        return new CustomerAddressesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(array $resources): CustomerAddressesResponse
    {
        return new CustomerAddressesResponse($this->createResources());
    }

    public function update(array $resources): CustomerAddressesResponse
    {
        return new CustomerAddressesResponse($this->updateResources());
    }
}
