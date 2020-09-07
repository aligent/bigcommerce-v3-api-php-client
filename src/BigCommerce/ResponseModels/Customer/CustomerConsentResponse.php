<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerConsent;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CustomerConsentResponse extends SingleResourceResponse
{
    private CustomerConsent $consent;

    public function getConsent(): CustomerConsent
    {
        return $this->consent;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->consent = new CustomerConsent($rawData);
    }
}
