<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\Placement;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PlacementsResponse extends PaginatedResponse
{
    /**
     * @return Placement[]
     */
    public function getPlacements(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Placement::class;
    }
}
