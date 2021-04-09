<?php

namespace BigCommerce\ApiV3\Api\Catalog\Categories;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryMetafield;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Category\CategoryMetafieldsResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Category Metafields API
 *
 * Usage:
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * // Get All Metafields
 * $metafields = $api->catalog()->category(1)->metafields();
 *
 * // Delete a single Metafield
 * $api->catalog()->category(1)->metafield($metafields[0]->id)->delete();
 * ```
 *
 * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/category-metafields/getcategorymetafieldsbycategoryid
 *
 */
class CategoryMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELD_ENDPOINT  = 'catalog/categories/%d/metafields/%d';
    private const METAFIELDS_ENDPOINT = 'catalog/categories/%d/metafields';


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

    public function create(CategoryMetafield $categoryMetafield): CategoryMetafieldResponse
    {
        $categoryMetafield->resource_id = $this->getParentResourceId() ?? 0;
        return new CategoryMetafieldResponse($this->createResource($categoryMetafield));
    }

    public function update(CategoryMetafield $categoryMetafield): CategoryMetafieldResponse
    {
        return new CategoryMetafieldResponse($this->updateResource($categoryMetafield));
    }
}
