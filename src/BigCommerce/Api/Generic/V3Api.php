<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;

interface V3Api
{
    public function __construct(Client $client, ?int $resourceId = null, ?int $parentResourceId = null);
    public function getResourceId(): ?int;
    public function getClient(): Client;
}
