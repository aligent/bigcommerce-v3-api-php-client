<?php

namespace BigCommerce\ApiV3\ResponseModels\Site;

use BigCommerce\ApiV3\ResourceModels\Site\Site;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class SitesResponse extends PaginatedResponse
{
    /**
     * @return Site[]
     */
    public function getSites(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Site::class;
    }
}
