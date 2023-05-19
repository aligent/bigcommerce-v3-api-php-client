<?php

namespace BigCommerce\ApiV3\ResponseModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\Webhook\Webhook;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class WebhooksResponse extends PaginatedResponse
{
    /**
     * @return Webhook[]
     */
    public function getWebhooks(): array
    {
        return $this->getData();
    }
    protected function resourceClass(): string
    {
        return Webhook::class;
    }
}
