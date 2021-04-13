<?php

namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelCurrencyAssignmentsResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

/**
 * Channel Currency Assignments API
 *
 *
 */
class ChannelCurrencyAssignmentsApi extends V3ApiBase
{
    use GetAllResources;
    use DeleteResource;
    use UpdateResource;
    use CreateResource;
    use BatchUpdateResource;

// batchcreate?

    private const CURRENCY_ASSIGNMENTS_ENDPOINT = 'channels/currency-assignments';
    private const CURRENCY_ASSIGNMENT_ENDPOINT  = 'channels/%d/currency-assignments';


    public function create(): ChannelCurrencyAssignmentsResponse
    {
    }

    public function update(): ChannelCurrencyAssignmentsResponse
    {
    }

    public function batchUpdate(array $resources): ChannelCurrencyAssignmentsResponse
    {
        // TODO: Implement batchUpdate() method.
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ChannelCurrencyAssignmentsResponse
    {
        return new ChannelCurrencyAssignmentsResponse($this->getAllResources($filters, $page, $limit));
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CURRENCY_ASSIGNMENTS_ENDPOINT;
    }

    /**
     * Currency Assignment endpoints are different, they are all multiple resource endpoints, that may or may not
     * be filtered by channel id.
     *
     * @return string
     */
    public function multipleResourceUrl(): string
    {
        return $this->getParentResourceId() ? $this->singleResourceUrl() : $this->multipleResourcesEndpoint();
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CURRENCY_ASSIGNMENT_ENDPOINT, $this->getParentResourceId());
    }
}
