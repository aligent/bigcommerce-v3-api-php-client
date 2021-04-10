<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelListing;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelListingResponse extends SingleResourceResponse
{
    private ChannelListing $channelListing;

    public function getChannelListing(): ChannelListing
    {
        return $this->channelListing;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->channelListing = new ChannelListing($rawData);
    }
}
