<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerCredentialsValidation;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ValidateCredentialsResponse extends SingleResourceResponse
{
    private CustomerCredentialsValidation $credentialsValidation;

    protected function decodeResponseBody(object $responseBody): object
    {
        return $responseBody;
    }

    public function getCredentialsValidation(): CustomerCredentialsValidation
    {
        return $this->credentialsValidation;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->credentialsValidation = new CustomerCredentialsValidation($rawData);
    }
}
