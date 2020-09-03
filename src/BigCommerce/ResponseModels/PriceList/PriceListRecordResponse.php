<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListRecord;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class PriceListRecordResponse extends SingleResourceResponse
{
    private PriceListRecord $record;

    public function getRecord(): PriceListRecord
    {
        return $this->record;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->record = new PriceListRecord($rawData);
    }
}
