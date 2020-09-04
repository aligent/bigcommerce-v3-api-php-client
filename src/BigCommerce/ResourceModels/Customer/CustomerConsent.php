<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerConsent extends ResourceModel
{
    /**
     * @var string[]
     */
    public array $allow;
    /**
     * @var string[]
     */
    public array $deny;
    public ?string $updated_at;
}
