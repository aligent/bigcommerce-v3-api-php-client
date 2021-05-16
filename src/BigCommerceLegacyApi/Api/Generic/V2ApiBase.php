<?php


namespace BigCommerce\ApiV2\Api\Generic;


use BigCommerce\ApiV2\V2ApiClient;

class V2ApiBase implements V2Api
{
    private V2ApiClient $client;
    private ?int $resourceId;
    private ?int $parentResourceId;

    public function __construct(V2ApiClient $client, ?int $resourceId = null, ?int $parentResourceId = null)
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

    public function getClient(): V2ApiClient
    {
        return $this->client;
    }
}
