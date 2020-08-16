<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CustomerResponse extends SingleResourceResponse
{
    private Customer $customer;

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->customer = new Customer($rawData);
    }
}
