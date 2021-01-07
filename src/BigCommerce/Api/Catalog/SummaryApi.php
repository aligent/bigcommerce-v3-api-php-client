<?php

namespace BigCommerce\ApiV3\Api\Catalog;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use BigCommerce\ApiV3\ResponseModels\SummaryResponse;
use UnexpectedValueException;

class SummaryApi extends ResourceApi
{
    private const RESOURCE_NAME    = 'summary';
    private const SUMMARY_ENDPOINT = 'catalog/summary';

    protected function singleResourceEndpoint(): string
    {
        return $this->multipleResourcesEndpoint();
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::SUMMARY_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): SummaryResponse
    {
        return new SummaryResponse($this->getAllResources());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        throw new UnexpectedValueException('GetAll is not implemented for summary');
    }
}
