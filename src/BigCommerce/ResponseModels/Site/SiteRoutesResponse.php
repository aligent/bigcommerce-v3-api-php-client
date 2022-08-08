<?php

namespace BigCommerce\ApiV3\ResponseModels\Site;

use BigCommerce\ApiV3\ResourceModels\Site\SiteRoute;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class SiteRoutesResponse extends PaginatedResponse
{
    /**
     * @return SiteRoute[]
     */
    public function getRoutes(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return SiteRoute::class;
    }
}
