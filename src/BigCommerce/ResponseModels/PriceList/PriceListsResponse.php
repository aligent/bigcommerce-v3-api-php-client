<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceList;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListsResponse extends PaginatedResponse
{
    /**
     * @var PriceList[]
     */
    private array $priceLists;

    /**
     * @return PriceList[]
     */
    public function getPriceLists(): array
    {
        return $this->priceLists;
    }

    protected function addData(array $data): void
    {
        $this->priceLists = array_map(function (\stdClass $l) {
            return new PriceList($l);
        }, $data);
    }
}
