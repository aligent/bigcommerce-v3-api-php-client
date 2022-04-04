<?php

namespace BigCommerce\ApiV2\Api\Generic;

use BigCommerce\ApiV3\BaseApiClient;

interface V2Api
{
    public function __construct(BaseApiClient $client, ?int $resourceId = null, ?int $parentResourceId = null);
    public function getResourceId(): ?int;
    public function getClient(): BaseApiClient;
}
