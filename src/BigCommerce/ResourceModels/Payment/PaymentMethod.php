<?php

namespace BigCommerce\ApiV3\ResourceModels\Payment;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PaymentMethod extends ResourceModel
{
    public string $id;
    public string $name;
    public array $stored_instruments;
    public array $supported_instruments;
    public bool $test_mode;
    public string $type;
}
