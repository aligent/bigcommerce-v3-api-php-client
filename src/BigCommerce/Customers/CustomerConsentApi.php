<?php

namespace BigCommerce\ApiV3\Customers;

use BigCommerce\ApiV3\Api\GetResource;
use BigCommerce\ApiV3\Api\UpdateResource;
use BigCommerce\ApiV3\Api\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerConsentResponse;

class CustomerConsentApi extends V3ApiBase
{
    use GetResource;
    use UpdateResource;

    private const CUSTOMER_CONSENT_ENDPOINT = 'customers/%d/consent';

    public function get(): CustomerConsentResponse
    {
        return new CustomerConsentResponse($this->getResource());
    }

    public function update($consent): CustomerConsentResponse
    {
        return new CustomerConsentResponse($this->updateResource($consent));
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CUSTOMER_CONSENT_ENDPOINT, $this->getResourceId());
    }
}
