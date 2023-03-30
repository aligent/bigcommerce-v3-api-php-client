<?php

namespace BigCommerce\ApiV3\Api\Webhooks;

use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Webhook\WebhookEventsResponse;

class WebhookEventsApi extends V3ApiBase
{
    use GetAllResources;

    public const EVENTS_ENDPOINT = 'hooks/events';

    public function multipleResourceUrl(): string
    {
        return self::EVENTS_ENDPOINT;
    }

    /**
     * Get a list of events that were sent but not successfully received. Events are stored for not less than one week
     */
    public function getAll(array $filters = [], int $page = 1, int $limit = 250): WebhookEventsResponse
    {
        return new WebhookEventsResponse($this->getAllResources($filters, $page, $limit));
    }
}
