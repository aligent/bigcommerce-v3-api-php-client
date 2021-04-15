<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ChannelCurrencyAssignmentsResponse extends PaginatedBatchableResponse
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
