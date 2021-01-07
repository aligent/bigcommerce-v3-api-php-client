<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\OrderMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class OrderMetafieldsResponse extends PaginatedResponse
{
    /**
     * @return OrderMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return OrderMetafield::class;
    }
}
