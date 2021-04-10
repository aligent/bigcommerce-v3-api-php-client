<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelTheme;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelActiveThemeResponse extends SingleResourceResponse
{
    private ChannelTheme $channelTheme;

    public function getChannelTheme(): ChannelTheme
    {
        return $this->channelTheme;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->channelTheme = new ChannelTheme($rawData);
    }
}
