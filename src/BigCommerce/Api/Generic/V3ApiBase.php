<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;

/**
 * V3ApiBase
 *
 * Add constructors and some basic scaffolding that will work for all API classes
 * regardless of which endpoints they implement
 *
 */
class V3ApiBase implements V3Api
{
    private Client $client;

    private ?int $resourceId;

    private ?int $parentResourceId;

    public function __construct(Client $client, ?int $resourceId = null, ?int $parentResourceId = null)
    {
        $this->client           = $client;
        $this->resourceId       = $resourceId;
        $this->parentResourceId = $parentResourceId;
    }

    public function getParentResourceId(): ?int
    {
        return $this->parentResourceId;
    }

    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
