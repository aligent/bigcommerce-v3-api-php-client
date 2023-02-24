<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerCredentialsValidation extends ResourceModel
{
    public ?int $customer_id;
    public bool $is_valid;
}
