<?php


namespace BigCommerce\ApiV3\Catalog;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use BigCommerce\ApiV3\ResponseModels\CategoriesResponse;
use BigCommerce\ApiV3\ResponseModels\CategoryResponse;

class CategoriesApi extends ResourceApi
{
    const RESOURCE_NAME       = 'categories';
    const CATEGORIES_ENDPOINT = 'catalog/categories';
    const CATEGORY_ENDPOINT   = 'catalog/categories/%d';

    public function get(): CategoryResponse
    {
        return new CategoryResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CategoriesResponse
    {
        return new CategoriesResponse($this->getAllResources($filters, $page, $limit));
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
}
