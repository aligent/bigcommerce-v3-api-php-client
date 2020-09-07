<?php

namespace BigCommerce\ApiV3\ResponseModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\PriceList\PriceList;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class PriceListsResponse extends PaginatedResponse
{
    /**
     * @return PriceList[]
     */
    public function getPriceLists(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return PriceList::class;
    }
}
