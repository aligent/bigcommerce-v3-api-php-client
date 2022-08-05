<?php

namespace BigCommerce\ApiV3\Api\Sites;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Site\Site;
use BigCommerce\ApiV3\ResponseModels\Site\SiteResponse;
use BigCommerce\ApiV3\ResponseModels\Site\SitesResponse;
use Psr\Http\Message\ResponseInterface;

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

    public function create(Site $site): ResponseInterface
    {
        return $this->createResource($site);
    }

    public function update(Site $site): ResponseInterface
    {
        return $this->updateResource($site);
    }

    public function routes(): SiteRoutesApi
    {
        return new SiteRoutesApi($this->getClient(), null, $this->getResourceId());
    }

    public function route(int $id): SiteRoutesApi
    {
        return new SiteRoutesApi($this->getClient(), $id, $this->getResourceId());
    }
}
