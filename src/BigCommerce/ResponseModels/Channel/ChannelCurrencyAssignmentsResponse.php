<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ChannelCurrencyAssignmentsResponse extends PaginatedResponse
{
    /**
     * @return ChannelCurrencyAssignment[]
     */
    public function getCurrencyAssignments(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ChannelCurrencyAssignment::class;
    }
}
