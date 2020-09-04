<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\CustomerFormFieldValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use stdClass;

class CustomerFormFieldValuesResponse extends PaginatedResponse
{
    /**
     * @var CustomerFormFieldValue[]
     */
    private array $values;

    /**
     * @return CustomerFormFieldValue[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    protected function addData(array $data): void
    {
        $this->values = array_map(function (stdClass $v) {
            return new CustomerFormFieldValue($v);
        }, $data);
    }
}
