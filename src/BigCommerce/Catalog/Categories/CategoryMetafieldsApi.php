<?php


namespace BigCommerce\ApiV3\Catalog\Categories;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryMetafieldsResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

class CategoryMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELD_ENDPOINT  = 'catalog/categories/{category_id}/metafields/%d';
    private const METAFIELDS_ENDPOINT = 'catalog/categories/{category_id}/metafields';

    protected function singleResourceEndpoint(): string
    {
        return self::METAFIELD_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::METAFIELDS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): CategoryMetafieldResponse
    {
        return new CategoryMetafieldResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CategoryMetafieldsResponse
    {
        return new CategoryMetafieldsResponse($this->getAllResources($filters, $page, $limit));
    }
}
