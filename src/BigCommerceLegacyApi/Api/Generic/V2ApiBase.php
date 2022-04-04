<?php

namespace BigCommerce\ApiV2\Api\Generic;

use BigCommerce\ApiV3\BaseApiClient;

class V2ApiBase implements V2Api
{
    private BaseApiClient $client;
    private ?int $resourceId;
    private ?int $parentResourceId;

    public function __construct(BaseApiClient $client, ?int $resourceId = null, ?int $parentResourceId = null)
    {
        $this->client = $client;
        $this->resourceId = $resourceId;
        $this->parentResourceId = $parentResourceId;
    }

    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    public function getParentResourceId(): ?int
    {
        return $this->parentResourceId;
    }

    public function getClient(): BaseApiClient
    {
        return $this->client;
    }
}
