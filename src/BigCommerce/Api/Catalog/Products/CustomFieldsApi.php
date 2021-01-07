<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\CustomField;
use BigCommerce\ApiV3\ResponseModels\CustomFieldResponse;
use BigCommerce\ApiV3\ResponseModels\CustomFieldsResponse;

class CustomFieldsApi extends ResourceApi
{
    public const RESOURCE_NAME = 'custom-fields';
    public const CUSTOM_FIELDS_ENDPOINT = 'catalog/products/%d/custom-fields';
    public const CUSTOM_FIELD_ENDPOINT  = 'catalog/products/%d/custom-fields/%d';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function create(CustomField $customField): CustomFieldResponse
    {
        return new CustomFieldResponse($this->createResource($customField));
    }

    public function update(CustomField $customField): CustomFieldResponse
    {
        return new CustomFieldResponse($this->updateResource($customField));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomFieldsResponse
    {
        return new CustomFieldsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function get(): CustomFieldResponse
    {
        return new CustomFieldResponse($this->getResource());
    }

    protected function singleResourceEndpoint(): string
    {
        return self::CUSTOM_FIELD_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CUSTOM_FIELDS_ENDPOINT;
    }
}
