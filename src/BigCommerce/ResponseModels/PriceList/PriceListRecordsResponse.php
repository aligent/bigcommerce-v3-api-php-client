<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListRecord;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListRecordsResponse extends PaginatedResponse
{
    /**
     * @var PriceListRecord[]
     */
    private array $records;

    /**
     * @return PriceListRecord[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    protected function addData(array $data): void
    {
        $this->records = array_map(function (\stdClass $r) {
            return new PriceListRecord($r);
        }, $data);
    }
}
