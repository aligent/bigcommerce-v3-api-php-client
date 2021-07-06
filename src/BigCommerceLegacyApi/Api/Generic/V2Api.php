<?php

namespace BigCommerce\ApiV2\Api\Generic;

use BigCommerce\ApiV2\V2ApiClient;

interface V2Api
{
    public function __construct(V2ApiClient $client, ?int $resourceId = null, ?int $parentResourceId = null);
    public function getResourceId(): ?int;
    public function getClient(): V2ApiClient;
}
