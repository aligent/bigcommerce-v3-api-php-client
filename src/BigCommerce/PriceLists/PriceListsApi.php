<?php

namespace BigCommerce\ApiV3\PriceLists;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListResponse;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListsResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

class PriceListsApi extends ResourceApi
{
    private const RESOURCE_NAME   = 'pricelists';
    private const BRAND_ENDPOINT  = 'pricelists/%d';
    private const BRANDS_ENDPOINT = 'pricelists';

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

    public function get(): PriceListResponse
    {
        return new PriceListResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PriceListsResponse
    {
        return new PriceListsResponse($this->getAllResources($filters, $page, $limit));
    }
}
