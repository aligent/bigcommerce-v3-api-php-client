<?php

namespace BigCommerce\ApiV3\Api\Subscribers;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Customer\SubscriberResponse;
use BigCommerce\ApiV3\ResponseModels\Customer\SubscribersResponse;

class SubscribersApi extends ResourceApi
{
    private const RESOURCE_NAME         = 'subscribers';
    private const SUBSCRIBERS_ENDPOINT  = 'customers/subscribers';
    private const SUBSCRIBER_ENDPOINT   = 'customers/subscribers/%d';

    protected function singleResourceEndpoint(): string
    {
        return self::SUBSCRIBER_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::SUBSCRIBERS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): SubscriberResponse
    {
        return new SubscriberResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): SubscribersResponse
    {
        return new SubscribersResponse($this->getAllResources($filters, $page, $limit));
    }
}
