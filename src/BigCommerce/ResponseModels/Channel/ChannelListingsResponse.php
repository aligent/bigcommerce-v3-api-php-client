<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelListing;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ChannelListingsResponse extends PaginatedResponse
{
    /**
     * @return ChannelListing[]
     */
    public function getChannelListings(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ChannelListing::class;
    }
}
