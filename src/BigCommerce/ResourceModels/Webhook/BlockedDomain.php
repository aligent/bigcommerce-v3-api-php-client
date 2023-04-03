<?php

namespace BigCommerce\ApiV3\ResourceModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class BlockedDomain extends ResourceModel
{
    public string $destination;
    public string $time_left;

    /**
     * @var BlockedDomainReason[]
     */
    public array $reasons;

    protected function beforeBuildObject(): void
    {
        self::buildObjectArray('reasons', BlockedDomainReason::class);
        parent::beforeBuildObject();
    }
}
