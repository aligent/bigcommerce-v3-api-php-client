<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListRecord;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListRecordsResponse extends PaginatedResponse
{
    /**
     * @return PriceListRecord[]
     */
    public function getRecords(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return PriceListRecord::class;
    }
}
