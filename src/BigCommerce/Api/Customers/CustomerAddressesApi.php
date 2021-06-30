<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerAddressesResponse;

class CustomerAddressesApi extends CustomerApiBase
{
    use DeleteInIdList;

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
        return new CustomerAddressesResponse($this->createResources($resources));
    }

    public function update(array $resources): CustomerAddressesResponse
    {
        return new CustomerAddressesResponse($this->updateResources($resources));
    }
}
