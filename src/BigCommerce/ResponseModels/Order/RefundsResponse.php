<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\RefundQuote;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class RefundsResponse extends PaginatedResponse
{
    /**
     * @return RefundQuote[]
     */
    public function refunds(): array
    {
        return $this->getData();
    }
    protected function resourceClass(): string
    {
        return RefundQuote::class;
    }
}
