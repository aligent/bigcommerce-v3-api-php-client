<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CustomerSettingsResponse extends SingleResourceResponse
{
    private CustomerSettings $customerSettings;

    public function getCustomerSettings(): CustomerSettings
    {
        return $this->customerSettings;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->customerSettings = new CustomerSettings($rawData);
    }
}
