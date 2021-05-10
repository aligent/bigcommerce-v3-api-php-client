<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerAuthentication extends ResourceModel
{
    public bool $force_password_reset;
    public string $new_password;
}
