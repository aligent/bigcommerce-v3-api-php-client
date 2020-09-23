<?php

namespace BigCommerce\ApiV3\Orders;

use BigCommerce\ApiV3\Api\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Order\TransactionsResponse;

class OrdersApi extends V3ApiBase
{
    private const ORDER_ENDPOINT = 'orders/%d';
    private const TRANSACTIONS_ENDPOINT = self::ORDER_ENDPOINT.'/transactions';

    public function transactions(): TransactionsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            sprintf(self::TRANSACTIONS_ENDPOINT, $this->getResourceId())
        );

        return new TransactionsResponse($response);
    }

    public function refunds()
    {
    }

    public function refund()
    {
    }
}
