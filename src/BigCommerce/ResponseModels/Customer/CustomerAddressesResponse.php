<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAddress;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAddressesResponse extends PaginatedResponse
{
    /**
     * @var CustomerAddress[]
     */
    private array $addresses;

    /**
     * @return CustomerAddress[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    protected function addData(array $data): void
    {
        $this->addresses = array_map(function (stdClass $a) {
            return new CustomerAddress($a);
        }, $data);
    }
}
