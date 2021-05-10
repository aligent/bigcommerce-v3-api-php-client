<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerAttributeValue extends ResourceModel
{
    public int $attribute_id;
    public string $value;
    public ?int $customer_id;
    public ?int $id;
}
