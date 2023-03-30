<?php

namespace BigCommerce\ApiV3\ResourceModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WebhookEvent extends ResourceModel
{
    public string $scope;
    public string $store_id;
    public object $data;
    public string $hash;
    public string $created_at;
    public string $producer;
}
