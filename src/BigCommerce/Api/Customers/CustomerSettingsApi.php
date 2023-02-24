<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerSettingsResponse;

class CustomerSettingsApi extends V3ApiBase
{
    use GetResource;
    use UpdateResource;

    public const CUSTOMER_SETTINGS_ENDPOINT = 'customers/settings';

    public function get(): CustomerSettingsResponse
    {
        return new CustomerSettingsResponse($this->getResource());
    }

    public function singleResourceUrl(): string
    {
        return self::CUSTOMER_SETTINGS_ENDPOINT;
    }

    public function update(CustomerSettings $settings): CustomerSettingsResponse
    {
        return new CustomerSettingsResponse($this->updateResource($settings));
    }

    public function channel(int $channelId): CustomerSettingsPerChannelApi
    {
        return new CustomerSettingsPerChannelApi($this->getClient(), $channelId);
    }
}
