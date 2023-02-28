<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\ResourceModels\Customer\CustomerChannelSettings;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerChannelSettingsResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerSettingsPerChannelApi extends ResourceApi
{
    use GetResource;
    use UpdateResource;

    private const SETTINGS_PER_CHANNEL_ENDPOINT = 'customers/settings/channels/%d';


    protected function singleResourceEndpoint(): string
    {
        return self::SETTINGS_PER_CHANNEL_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::SETTINGS_PER_CHANNEL_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return 'settings';
    }

    public function get(): CustomerChannelSettingsResponse
    {
        return new CustomerChannelSettingsResponse($this->getResource());
    }

    public function update(CustomerChannelSettings $channelSettings): CustomerChannelSettingsResponse
    {
        return new CustomerChannelSettingsResponse($this->updateResource($channelSettings));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        throw new \UnexpectedValueException("Unable to get all Customer Settings Per Channel");
    }
}
