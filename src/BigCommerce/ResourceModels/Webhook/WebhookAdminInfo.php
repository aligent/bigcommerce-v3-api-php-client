<?php

namespace BigCommerce\ApiV3\ResourceModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WebhookAdminInfo extends ResourceModel
{
    /**
     * @var string[]
     */
    public array $emails;
    /**
     * @var Webhook[]
     */
    public array $hooks_list;
    /**
     * @var BlockedDomain[]
     */
    public array $blocked_domains;

    protected function beforeBuildObject(): void
    {
        self::buildObjectArray('hooks_list', Webhook::class);
        self::buildObjectArray('blocked_domains', BlockedDomain::class);
        parent::beforeBuildObject();
    }
}
