<?php

namespace BigCommerce\ApiV3\ResponseModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\Webhook\Webhook;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class WebhookResponse extends SingleResourceResponse
{
    private Webhook $webhook;

    public function getWebhook(): Webhook
    {
        return $this->webhook;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->webhook = new Webhook($rawData);
    }
}
