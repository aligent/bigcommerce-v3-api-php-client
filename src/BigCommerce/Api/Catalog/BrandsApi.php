<?php

namespace BigCommerce\ApiV3\Api\Catalog;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Catalog\Brands\BrandImageApi;
use BigCommerce\ApiV3\Api\Catalog\Brands\BrandMetafieldsApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandResponse;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandsResponse;

/**
 * Class BrandsApi
 *
 */
class BrandsApi extends ResourceApi
{
    private const RESOURCE_NAME   = 'brands';
    private const BRAND_ENDPOINT  = 'catalog/brands/%d';
    private const BRANDS_ENDPOINT = 'catalog/brands';

    protected function singleResourceEndpoint(): string
    {
        return self::BRAND_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::BRANDS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    /**
     * Returns a single Brand.
     *
     * Optionally it is possible to specify fields to be include or excluded from results.
     *
     * @param string[]|null $include_fields
     *              Fields to include, in a comma-separated list. The ID and the specified fields will be returned.
     * @param string[]|null $exclude_fields
     *              Fields to exclude, in a comma-separated list. The specified fields will be excluded from a response.
     *              The ID cannot be excluded.
     * @return BrandResponse
     */
    public function get(?array $include_fields = null, ?array $exclude_fields = null): BrandResponse
    {
        return new BrandResponse($this->getResource());
    }

    /**
     * Returns a list of Brands.
     *
     * Optional filter parameters can be passed in.
     *
     * @param array<string, mixed> $filters
     *                          Array of optional features. For available filters, see {@see https://developer.bigcommerce.com/api-reference/store-management/catalog/brands/getbrands}
     * @param int $page         The page number to be fetched
     * @param int $limit        Maximum brands per page returned
     * @return BrandsResponse
     */
    public function getAll(array $filters = [], int $page = 1, int $limit = 250): BrandsResponse
    {
        return new BrandsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(Brand $brand): BrandResponse
    {
        return new BrandResponse($this->createResource($brand));
    }

    public function update(Brand $brand): BrandResponse
    {
        return new BrandResponse($this->updateResource($brand));
    }

    public function getAllPages(array $filter = []): BrandsResponse
    {
        return BrandsResponse::buildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
    }

    public function image(): BrandImageApi
    {
        return new BrandImageApi($this->getClient(), null, $this->getResourceId());
    }

    public function metafields(): BrandMetafieldsApi
    {
        return new BrandMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }

    public function metafield(int $id): BrandMetafieldsApi
    {
        return new BrandMetafieldsApi($this->getClient(), $id, $this->getResourceId());
    }
}
