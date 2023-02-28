<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerChannelSettings;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CustomerChannelSettingsResponse extends SingleResourceResponse
{
    private CustomerChannelSettings $channelSettings;

    public function getChannelSettings(): CustomerChannelSettings
    {
        return $this->channelSettings;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->channelSettings = new CustomerChannelSettings($rawData);
    }
}
