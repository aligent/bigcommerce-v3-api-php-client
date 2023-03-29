<?php

namespace BigCommerce\ApiV3\Api\Webhooks;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Webhook\Webhook;
use BigCommerce\ApiV3\ResponseModels\Webhook\WebhookResponse;
use BigCommerce\ApiV3\ResponseModels\Webhook\WebhooksResponse;

class WebhooksApi extends ResourceApi
{
    public const WEBHOOK_ENDPOINT = 'hooks/%d';
    public const WEBHOOKS_ENDPOINT = 'hooks';
    public const RESOURCE_NAME = 'hooks';

    public function get(): WebhookResponse
    {
        return new WebhookResponse($this->getResource());
    }

    /**
     * Creates a webhook. Only one webhook at a time can be created. Custom headers can be added.
     * Destination URL must be served on port 443 (custom ports are not currently supported).
     */
    public function create(Webhook $webhook): WebhookResponse
    {
        return new WebhookResponse($this->createResource($webhook));
    }

    public function update(Webhook  $webhook): WebhookResponse
    {
        return new WebhookResponse($this->updateResource($webhook));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::WEBHOOK_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::WEBHOOKS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): WebhooksResponse
    {
        return new WebhooksResponse($this->getAllResources($filters, $page, $limit));
    }
}
