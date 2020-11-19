<?php

namespace BigCommerce\ApiV3\Api\PriceLists;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListResponse;
use BigCommerce\ApiV3\ResponseModels\PriceList\PriceListsResponse;

class PriceListsApi extends ResourceApi
{
    private const RESOURCE_NAME   = 'pricelists';
    private const PRICELIST_ENDPOINT  = 'pricelists/%d';
    private const PRICELISTS_ENDPOINT = 'pricelists';

    protected function singleResourceEndpoint(): string
    {
        return self::PRICELIST_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::PRICELISTS_ENDPOINT;
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

    public function assignments(): PriceListAssignmentsApi
    {
        return new PriceListAssignmentsApi($this->getClient());
    }

    public function records(): PriceListRecordsApi
    {
        return new PriceListRecordsApi($this->getClient(), null, $this->getResourceId());
    }
}
