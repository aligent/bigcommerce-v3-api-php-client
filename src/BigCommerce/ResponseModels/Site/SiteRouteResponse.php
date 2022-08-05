<?php

namespace BigCommerce\ApiV3\ResponseModels\Site;

use BigCommerce\ApiV3\ResourceModels\Site\SiteRoute;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class SiteRouteResponse extends SingleResourceResponse
{
    private SiteRoute $siteRoute;

    public function getSiteRoute(): SiteRoute
    {
        return $this->siteRoute;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->siteRoute = new SiteRoute($rawData);
    }
}
