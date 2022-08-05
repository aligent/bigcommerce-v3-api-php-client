<?php

namespace BigCommerce\ApiV3\Api\Sites;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use BigCommerce\ApiV3\ResponseModels\Site\SiteResponse;
use BigCommerce\ApiV3\ResponseModels\Site\SitesResponse;

class SitesApi extends ResourceApi
{
    private const RESOURCE_NAME  = 'sites';
    private const SITES_ENDPOINT = 'sites';
    private const SITE_ENDPOINT  = 'sites/%d';

    protected function singleResourceEndpoint(): string
    {
        return self::SITE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::SITES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): SiteResponse
    {
        return new SiteResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): SitesResponse
    {
        return new SitesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function routes()
    {
    }

    public function route(int $id)
    {
    }

    // certificate?
}
