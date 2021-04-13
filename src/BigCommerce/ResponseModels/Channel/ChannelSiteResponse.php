<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelSite;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelSiteResponse extends SingleResourceResponse
{
    private ChannelSite $site;

    public function getSite(): ChannelSite
    {
        return $this->site;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->site = new ChannelSite($rawData);
    }
}
