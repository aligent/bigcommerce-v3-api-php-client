<?php

namespace BigCommerce\ApiV3\ResponseModels\Site;

use BigCommerce\ApiV3\ResourceModels\Site\Site;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class SiteResponse extends SingleResourceResponse
{
    private Site $site;

    public function getSite(): Site
    {
        return $this->site;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->site = new Site($rawData);
    }
}
