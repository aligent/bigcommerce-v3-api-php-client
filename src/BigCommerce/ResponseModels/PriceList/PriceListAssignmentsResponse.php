<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListAssignment;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListAssignmentsResponse extends PaginatedResponse
{
    /**
     * @var PriceListAssignment[]
     */
    private array $assignments;

    /**
     * @return PriceListAssignment[]
     */
    public function getAssignments(): array
    {
        return $this->assignments;
    }

    protected function addData(array $data): void
    {
        $this->assignments = array_map(function (\stdClass $pla) {
            return new PriceListAssignment($pla);
        }, $data);
    }
}
