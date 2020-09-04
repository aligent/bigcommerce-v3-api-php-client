<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerFormFieldValue extends ResourceModel
{
    public string $name;
    /**
     * @var string|int|string[]
     */
    public $value;
    public ?int $address_id;
    public ?int $customer_id;
}
