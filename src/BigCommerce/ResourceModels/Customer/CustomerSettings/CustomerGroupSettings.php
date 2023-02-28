<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\CustomerSettings;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerGroupSettings extends ResourceModel
{
    public ?int $guest_customer_group_id;
    public ?int $default_customer_group_id;
}
