<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\Channel;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelResponse extends SingleResourceResponse
{
    private Channel $channel;

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->channel = new Channel($rawData);
    }
}
