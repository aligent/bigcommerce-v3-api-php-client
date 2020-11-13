<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerAttributesResponse;

class CustomerAttributesApi extends CustomerApiBase
{
    use DeleteInIdList;

    private const RESOURCE_NAME = 'attributes';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomerAttributesResponse
    {
        return new CustomerAttributesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(array $attributes): CustomerAttributesResponse
    {
        return new CustomerAttributesResponse($this->createResources($attributes));
    }

    public function update(array $attributes): CustomerAttributesResponse
    {
        return new CustomerAttributesResponse($this->updateResources($attributes));
    }
}
