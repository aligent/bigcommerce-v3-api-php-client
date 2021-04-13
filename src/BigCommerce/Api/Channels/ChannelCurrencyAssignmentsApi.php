<?php

namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\ResourceWithBatchUpdateApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

/**
 * Channel Currency Assignments API
 *
 *
 */
class ChannelCurrencyAssignmentsApi extends ResourceWithBatchUpdateApi
{

    public function batchUpdate(array $resources): PaginatedResponse
    {
        // TODO: Implement batchUpdate() method.
    }

    protected function multipleResourcesEndpoint(): string
    {
        // TODO: Implement multipleResourcesEndpoint() method.
    }

    protected function singleResourceEndpoint(): string
    {
        // TODO: Implement singleResourceEndpoint() method.
    }

    protected function resourceName(): string
    {
        // TODO: Implement resourceName() method.
    }

    public function get(): SingleResourceResponse
    {
        // TODO: Implement get() method.
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        // TODO: Implement getAll() method.
    }

    public function create(): SingleResourceResponse
    {
    }

    public function update(): SingleResourceResponse
    {
    }
}
