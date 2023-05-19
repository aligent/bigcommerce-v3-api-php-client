<?php

namespace BigCommerce\ApiV3\ResponseModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\Webhook\WebhookEvent;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class WebhookEventsResponse extends PaginatedResponse
{
    /**
     * @return WebhookEvent[]
     */
    public function getEvents(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return WebhookEvent::class;
    }
}
