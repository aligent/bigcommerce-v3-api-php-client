<?php

namespace BigCommerce\ApiV3\ResourceModels\Webhook;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Webhook extends ResourceModel
{
    public int $id;
    public string $client_id;
    public string $store_hash;
    public string $scope;
    public string $destination;
    public array $headers;
    public string $created_at;
    public string $updated_at;
    public bool $is_active;

    protected function beforeBuildObject(): void
    {
        parent::beforeBuildObject();
        self::buildHashArray('headers');
    }
}
