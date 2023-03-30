<?php

namespace BigCommerce\ApiV3\ResponseModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\Webhook\WebhookAdminInfo;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class AdminInfoResponse extends SingleResourceResponse
{
    private WebhookAdminInfo $adminInfo;

    public function getAdminInfo(): WebhookAdminInfo
    {
        return $this->adminInfo;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->adminInfo = new WebhookAdminInfo($rawData);
    }
}
