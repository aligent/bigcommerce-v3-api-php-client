<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\Api\Generic\FetchAllPages;
use BigCommerce\ApiV3\ResourceModels\Order\Transaction;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class TransactionsResponse extends PaginatedResponse
{
    use FetchAllPages;

    /**
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Transaction::class;
    }
}
