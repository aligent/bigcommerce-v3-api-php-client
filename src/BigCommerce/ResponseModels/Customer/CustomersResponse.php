<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use stdClass;

class CustomersResponse extends PaginatedResponse
{
    private array $customers;

    /**
     * @return Customer[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    protected function addData(array $data): void
    {
        $this->customers = array_map(function (stdClass $c) {
            return new Customer($c);
        }, $data);
    }
}
