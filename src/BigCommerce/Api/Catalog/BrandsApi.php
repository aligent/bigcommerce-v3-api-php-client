<?php

namespace BigCommerce\ApiV3\Api\Catalog;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Catalog\Brands\BrandImageApi;
use BigCommerce\ApiV3\Api\Catalog\Brands\BrandMetafieldsApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandResponse;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandsResponse;

/**
 * Brands API
 *
 * For management of Brands.
 *
 * Example for finding and deleting all brands with id less than 100:
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $brandsToDelete = $api->catalog()->brands()->getAllPages(['id:less' => 100])->getBrands();
 *
 * foreach ($brandsToDelete as $brand) {
 *   $api->catalog()->brand($brand->id)->delete();
 * }
 * ```
 *
 */
class BrandsApi extends ResourceApi
{
    private const RESOURCE_NAME   = 'brands';
    private const BRAND_ENDPOINT  = 'catalog/brands/%d';
    private const BRANDS_ENDPOINT = 'catalog/brands';

    public const FILTER_INCLUDE_FIELDS = 'include_fields';
    public const FILTER_EXCLUDE_FIELDS = 'exclude_fields';

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
        $params = [
            self::FILTER_INCLUDE_FIELDS => $include_fields,
            self::FILTER_EXCLUDE_FIELDS => $exclude_fields,
        ];

        return new BrandResponse($this->getResource(array_filter($params)));
    }

    /**
     * Returns a list of Brands.
     *
     * Optional filter parameters can be passed in.
     *
     * @see \BigCommerce\ApiV3\Api\Catalog\BrandsApi::getAllPages()
     *
     * @param array<string, mixed> $filters
     *          Array of optional features. For available filters,
     *          see {@see https://developer.bigcommerce.com/api-reference/store-management/catalog/brands/getbrands}
     * @param int $page         The page number to be fetched
     * @param int $limit        Maximum brands per page returned
     * @return BrandsResponse
     */
    public function getAll(array $filters = [], int $page = 1, int $limit = 250): BrandsResponse
    {
        return new BrandsResponse($this->getAllResources($filters, $page, $limit));
    }

    /**
     * Creates a Brand.
     *
     * Example:
     *
     * ```php
     * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
     *
     * $brand = new BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand();
     * $brand->name = "My Brand";
     * $brand->meta_description = "My wonderful brand";
     *
     * $api->catalog()->brands()->create($brand);
     * ```
     *
     *
     * @param Brand $brand
     * @return BrandResponse
     *      Response will contain the created brand (i.e. it will include an id)
     */
    public function create(Brand $brand): BrandResponse
    {
        return new BrandResponse($this->createResource($brand));
    }

    /**
     * Update a Brand
     *
     * Example:
     *
     * ```php
     * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
     *
     * $brand = $api->catalog()->brand(123)->get()->getBrand();
     * $brand->meta_description .= " with some more information";
     *
     * $api->catalog()->brand(123)->update($brand);
     * ```
     *
     * @param Brand $brand
     * @return BrandResponse
     */
    public function update(Brand $brand): BrandResponse
    {
        return new BrandResponse($this->updateResource($brand));
    }

    /**
     * Get all brands, fetching multiple pages
     *
     * Collates the results of all pages into a single response.
     *
     * @see \BigCommerce\ApiV3\Api\Catalog\BrandsApi::getAll()
     *
     * @param array $filter
     *          Array of optional features. For available filters,
     *          see {@see https://developer.bigcommerce.com/api-reference/store-management/catalog/brands/getbrands}
     * @return BrandsResponse
     */
    public function getAllPages(array $filter = []): BrandsResponse
    {
        return BrandsResponse::buildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
    }

    /**
     * Get the Brand Image API for this brand
     *
     * Example
     * ```php
     * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
     *
     * $brandImageApi = $api->catalog()->brand(123)->image();
     * ```
     *
     * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/brand-images/createbrandimage
     *
     * @return BrandImageApi
     */
    public function image(): BrandImageApi
    {
        return new BrandImageApi($this->getClient(), null, $this->getResourceId());
    }

    /**
     * Get the Plural BrandMetafields API
     *
     * For actions on all metafields related to this brand.
     *
     * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/brand-metafields/getbrandmetafieldsbybrandid
     *
     * @return BrandMetafieldsApi
     */
    public function metafields(): BrandMetafieldsApi
    {
        return new BrandMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }

    /**
     * Get the singular Brand Metafields API
     *
     * For actions on a specific metafield for a brand.
     *
     *
     * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/brand-metafields/getbrandmetafieldbybrandid
     *
     * @param int $id
     * @return BrandMetafieldsApi
     */
    public function metafield(int $id): BrandMetafieldsApi
    {
        return new BrandMetafieldsApi($this->getClient(), $id, $this->getResourceId());
    }
}
