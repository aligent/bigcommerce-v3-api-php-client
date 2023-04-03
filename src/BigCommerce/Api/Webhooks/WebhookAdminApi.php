<?php

namespace BigCommerce\ApiV3\Api\Webhooks;

use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Webhook\AdminInfoResponse;
use GuzzleHttp\RequestOptions;

class WebhookAdminApi extends V3ApiBase
{
    use GetResource;

    public const WEBHOOK_ADMIN_ENDPOINT = 'hooks/admin';

    public function singleResourceUrl(): string
    {
        return self::WEBHOOK_ADMIN_ENDPOINT;
    }

    public function get(?bool $isActive = null): AdminInfoResponse
    {
        $filter = is_null($isActive) ? [] : ['is_active' => $isActive];
        return new AdminInfoResponse($this->getResource($filter));
    }

    /**
     * Update email addresses that are sent notification emails when any domain associated with the API account
     * is denylisted or when a webhook is deactivated. Supports upsert functionality in the case that no email
     * address exists yet.
     */
    public function upsertEmails(array $emails): void
    {
        $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => ['emails' => $emails]
            ]
        );
    }
}
