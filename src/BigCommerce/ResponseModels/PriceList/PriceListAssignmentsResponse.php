<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListAssignment;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListAssignmentsResponse extends PaginatedResponse
{
    /**
     * @return PriceListAssignment[]
     */
    public function getAssignments(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return PriceListAssignment::class;
    }
}
