<?php

namespace BigCommerce\ApiV3\Api\Orders;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Order\TransactionsResponse;

/**
 * V3 Orders API
 *
 * V3 API for Orders is quite limited, so a V2 API client is provided.
 *
 * @see \BigCommerce\ApiV2\Api\Orders\OrdersApi
 *
 */
class OrdersApi extends V3ApiBase
{
    private const ORDER_ENDPOINT = 'orders/%d';
    private const TRANSACTIONS_ENDPOINT = self::ORDER_ENDPOINT . '/transactions';

    public function transactions(): TransactionsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            sprintf(self::TRANSACTIONS_ENDPOINT, $this->getResourceId())
        );

        return new TransactionsResponse($response);
    }

    public function refunds(): RefundsApi
    {
        return new RefundsApi($this->getClient(), null, $this->getResourceId());
    }

    public function refund(): RefundsApi
    {
        return $this->refunds();
    }

    public function metafields(): OrderMetafieldsApi
    {
        return new OrderMetafieldsApi($this->getClient(), null, $this->getResourceId());
    }

    public function metafield(int $id): OrderMetafieldsApi
    {
        return new OrderMetafieldsApi($this->getClient(), $id, $this->getResourceId());
    }
}
