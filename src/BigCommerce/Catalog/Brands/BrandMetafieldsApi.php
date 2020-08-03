<?php


namespace BigCommerce\ApiV3\Catalog\Brands;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Brand\BrandMetafieldsResponse;

class BrandMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELD_ENDPOINT  = 'catalog/brands/{brand_id}/metafields';
    private const METAFIELDS_ENDPOINT = 'catalog/brands/{brand_id}/metafields/%d';

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

    public function get(): BrandMetafieldResponse
    {
        return new BrandMetafieldResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): BrandMetafieldsResponse
    {
        return new BrandMetafieldsResponse($this->getAllResources($filters, $page, $limit));
    }
}
