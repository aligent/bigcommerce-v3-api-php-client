<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAttributeValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class CustomerAttributeValuesResponse extends PaginatedResponse
{
    /**
     * @var CustomerAttributeValue[]
     */
    private array $values;

    /**
     * @return CustomerAttributeValue[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    protected function addData(array $data): void
    {
        $this->values = array_map(function (stdClass $v) {
            return new CustomerAttributeValue($v);
        }, $data);
    }
}
