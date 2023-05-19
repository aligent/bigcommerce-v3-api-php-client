<?php

namespace BigCommerce\ApiV3\ResourceModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class BlockedDomainReason extends ResourceModel
{
    public string $failure_description;
    public int $count;
    public int $timestamp;
}
