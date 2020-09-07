<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAttribute;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAttributesResponse extends PaginatedResponse
{
    /**
     * @var CustomerAttribute[]
     */
    private array $attributes;

    /**
     * @return CustomerAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    protected function addData(array $data): void
    {
        $this->customers = array_map(function (stdClass $a) {
            return new CustomerAttribute($a);
        }, $data);
    }
}
