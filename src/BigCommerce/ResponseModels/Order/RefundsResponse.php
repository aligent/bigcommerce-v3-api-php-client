<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\Refund;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class RefundsResponse extends PaginatedResponse
{
    /**
     * @return Refund[]
     */
    public function refunds(): array
    {
        return $this->getData();
    }
    protected function resourceClass(): string
    {
        return Refund::class;
    }
}
