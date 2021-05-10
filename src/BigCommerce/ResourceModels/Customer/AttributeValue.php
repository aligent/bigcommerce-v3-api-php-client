<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

/**
 * This is used when creating a customer with attribute values
 */
class AttributeValue extends ResourceModel
{
    public int $attribute_id;
    public string $attribute_value;
}
