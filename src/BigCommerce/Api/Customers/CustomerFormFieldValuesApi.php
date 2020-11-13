<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\ResponseModels\Customer\CustomerFormFieldValuesResponse;

class CustomerFormFieldValuesApi extends CustomerApiBase
{
    private const RESOURCE_NAME = 'form-field-values';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomerFormFieldValuesResponse
    {
        return new CustomerFormFieldValuesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function upsert(array $values): CustomerFormFieldValuesResponse
    {
        return new CustomerFormFieldValuesResponse($this->updateResources($values));
    }

    public function create(array $resources): CustomerFormFieldValuesResponse
    {
        return $this->upsert($resources);
    }

    public function update(array $resources): CustomerFormFieldValuesResponse
    {
        return $this->upsert($resources);
    }
}
