<?php

namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\BatchCreateResource;
use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelCurrencyAssignmentsResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

/**
 * Channel Currency Assignments API
 *
 * Example for finding all the currency assignments. Note that the parent id is effectively just a filter.
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $allCurrencyAssignments = $api->channels()->currencyAssignments()->getAll()->getCurrencyAssignments();
 * $channelCurrencyAssignments = $api->channel(1)->currencyAssignments()->getAll()->getCurrencyAssignments();
 * ```
 */
class ChannelCurrencyAssignmentsApi extends V3ApiBase
{
    use GetAllResources;
    use DeleteResource;
    use UpdateResource;
    use CreateResource;
    use BatchUpdateResource;
    use BatchCreateResource;

    private const CURRENCY_ASSIGNMENTS_ENDPOINT = 'channels/currency-assignments';
    private const CURRENCY_ASSIGNMENT_ENDPOINT  = 'channels/%d/currency-assignments';


    public function create(ChannelCurrencyAssignment $currencyAssignment): ChannelCurrencyAssignmentsResponse
    {
        return new ChannelCurrencyAssignmentsResponse($this->createResource($currencyAssignment));
    }

    public function update(ChannelCurrencyAssignment $currencyAssignment): ChannelCurrencyAssignmentsResponse
    {
        return new ChannelCurrencyAssignmentsResponse($this->updateResource($currencyAssignment));
    }

    /**
     * @param ChannelCurrencyAssignment[] $resources
     * @return ChannelCurrencyAssignmentsResponse
     */
    public function batchCreate(array $resources): PaginatedResponse
    {
        return ChannelCurrencyAssignmentsResponse::buildFromMultipleResponses($this->batchCreateResource($resources));
    }

    /**
     * @param ChannelCurrencyAssignment[] $resources
     * @return ChannelCurrencyAssignmentsResponse
     */
    public function batchUpdate(array $resources): ChannelCurrencyAssignmentsResponse
    {
        return ChannelCurrencyAssignmentsResponse::buildFromMultipleResponses($this->batchUpdateResource($resources));
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
