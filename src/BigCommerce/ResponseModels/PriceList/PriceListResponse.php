<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceList;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class PriceListResponse extends SingleResourceResponse
{
    private PriceList $priceList;

    /**
     * @return PriceList
     */
    public function getPriceList(): PriceList
    {
        return $this->priceList;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->priceList = new PriceList($rawData);
    }
}
