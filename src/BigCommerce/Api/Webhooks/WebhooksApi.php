<?php

namespace BigCommerce\ApiV3\Api\Webhooks;

use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Webhook\WebhookResponse;

class WebhooksApi extends V3ApiBase
{
    use GetResource;

    public const WEBHOOK_ENDPOINT = 'hooks/%d';

    public function singleResourceUrl(): string
    {
        return self::WEBHOOK_ENDPOINT;
    }

    public function get(): WebhookResponse
    {
        return new WebhookResponse($this->getResource());
    }
}
