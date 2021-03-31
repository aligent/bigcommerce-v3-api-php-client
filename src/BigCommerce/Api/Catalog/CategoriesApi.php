<?php

namespace BigCommerce\ApiV3\Api\Catalog;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Catalog\Categories\CategoryImageApi;
use BigCommerce\ApiV3\Api\Catalog\Categories\CategoryMetafieldsApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use BigCommerce\ApiV3\ResponseModels\Category\CategoriesResponse;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryResponse;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryTreeResponse;

class CategoriesApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'categories';
    private const CATEGORIES_ENDPOINT = 'catalog/categories';
    private const CATEGORY_ENDPOINT   = 'catalog/categories/%d';
    private const CATEGORY_TREE_ENDPOINT = 'catalog/categories/tree';

    public function image(): CategoryImageApi
    {
        return new CategoryImageApi($this->getClient(), null, $this->getResourceId());
    }

    public function get(): CategoryResponse
    {
        return new CategoryResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CategoriesResponse
    {
        return new CategoriesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function getCategoryTree(): CategoryTreeResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            self::CATEGORY_TREE_ENDPOINT
        );

        return new CategoryTreeResponse($response);
    }

    public function getAllPages(array $filter = []): CategoriesResponse
    {
        return CategoriesResponse::buildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
    }

    public function create(Category $category): CategoryResponse
    {
        return new CategoryResponse($this->createResource($category));
    }

    public function update(Category $category): CategoryResponse
    {
        return new CategoryResponse($this->updateResource($category));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::CATEGORY_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CATEGORIES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function metafield(int $metafieldId): CategoryMetafieldsApi
    {
        return new CategoryMetafieldsApi($this->getClient(), $metafieldId, $this->getResourceId());
    }

    public function metafields(): CategoryMetafieldsApi
    {
        return new CategoryMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }
}
