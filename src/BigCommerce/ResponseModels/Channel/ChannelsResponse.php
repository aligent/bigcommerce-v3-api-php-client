<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\Channel;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ChannelsResponse extends PaginatedResponse
{
    /**
     * @return Channel[]
     */
    public function getChannels(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Channel::class;
    }
}
