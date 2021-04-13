<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductMetafieldsResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

/**
 * Product Metafields API
 *
 * Usage:
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * // Get All Metafields
 * $metafields = $api->catalog()->product(1)->metafields();
 *
 * // Delete a single Metafield
 * $api->catalog()->product(1)->metafield($metafields[0]->id)->delete();
 * ```
 *
 * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/product-metafields/getproductmetafieldsbyproductid
 *
 */
class ProductMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELD_ENDPOINT  = 'catalog/product/%d/metafields/%d';
    private const METAFIELDS_ENDPOINT = 'catalog/product/%d/metafields';

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

    public function get(): ProductMetafieldResponse
    {
        return new ProductMetafieldResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductMetafieldsResponse
    {
        return new ProductMetafieldsResponse($this->getAllResources($filters, $page, $limit));
    }
}
