<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerAttributeValuesResponse;

class CustomerAttributeValuesApi extends CustomerApiBase
{
    use DeleteInIdList;

    private const RESOURCE_NAME = 'attribute-values';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomerAttributeValuesResponse
    {
        return new CustomerAttributeValuesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function upsert(array $attributes): CustomerAttributeValuesResponse
    {
        return new CustomerAttributeValuesResponse($this->updateResources($attributes));
    }

    public function create(array $values): CustomerAttributeValuesResponse
    {
        return $this->upsert($values);
    }

    public function update(array $values): CustomerAttributeValuesResponse
    {
        return $this->upsert($values);
    }
}
