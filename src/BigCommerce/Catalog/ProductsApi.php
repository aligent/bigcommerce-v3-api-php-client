<?php

namespace BigCommerce\ApiV3\Catalog;

use BigCommerce\ApiV3\Api\ResourceWithBatchUpdateApi;
use BigCommerce\ApiV3\Catalog\Products\ProductsSubResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\Product;
use BigCommerce\ApiV3\ResponseModels\Product\ProductResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductsResponse;

class ProductsApi extends ResourceWithBatchUpdateApi
{
    use ProductsSubResourceApi;

    public const RESOURCE_NAME     = 'products';
    public const PRODUCT_ENDPOINT  = 'catalog/products/%d';
    public const PRODUCTS_ENDPOINT = 'catalog/products';

    public const FILTER_IS_FEATURED = 'is_featured';
    public const FILTER_IS_VISIBLE  = 'is_visible';
    public const FILTER_SKU_IS      = 'sku';

    public const FILTER_INCLUDE_FIELDS = 'include_fields';

    public const FILTER_INCLUDE     = 'include';
    public const INCLUDE_MODIFIERS = 'modifiers';

    public function get(): ProductResponse
    {
        return new ProductResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductsResponse
    {
        return new ProductsResponse($this->getAllResources($filters, $page, $limit));
    }

    /**
     * Get all product pages combined
     *
     * @param array $filter
     * @return ProductsResponse
     */
    public function getAllPages(array $filter = []): ProductsResponse
    {
        return ProductsResponse::BuildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
    }

    public function create(Product $product): ProductResponse
    {
        return new ProductResponse($this->createResource($product));
    }

    public function update(Product $product): ProductResponse
    {
        return new ProductResponse($this->updateResource($product));
    }

    /**
     * @param Product[] $products
     * @return ProductsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function batchUpdate(array $products): ProductsResponse
    {
        return ProductsResponse::BuildFromMultipleResponses($this->batchUpdateResource($products));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::PRODUCT_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::PRODUCTS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }
}
