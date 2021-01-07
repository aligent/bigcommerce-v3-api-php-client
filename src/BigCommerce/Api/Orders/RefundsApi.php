<?php

namespace BigCommerce\ApiV3\Api\Orders;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\Order\OrderRefundItem;
use BigCommerce\ApiV3\ResponseModels\Order\RefundQuoteResponse;
use BigCommerce\ApiV3\ResponseModels\Order\RefundResponse;
use BigCommerce\ApiV3\ResponseModels\Order\RefundsResponse;
use GuzzleHttp\RequestOptions;

class RefundsApi extends V3ApiBase
{
    private const ORDER_REFUNDS_ENDPOINT = 'orders/%d/payment_actions';
    private const REFUND_QUOTE_ENDPOINT  = self::ORDER_REFUNDS_ENDPOINT . '/refund_quotes';
    private const REFUND_ENDPOINT        = self::ORDER_REFUNDS_ENDPOINT . '/refunds';

    /**
     * @param OrderRefundItem[] $items
     * @param string $reason
     * @return RefundResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $items, string $reason): RefundResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            sprintf(self::REFUND_ENDPOINT, $this->getParentResourceId()),
            [
                RequestOptions::JSON => []
            ]
        );

        return new RefundResponse($response);
    }

    public function createQuote(): RefundQuoteResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            sprintf(self::REFUND_QUOTE_ENDPOINT, $this->getParentResourceId()),
            [
                RequestOptions::JSON => []
            ]
        );

        return new RefundQuoteResponse($response);
    }

    public function getAll(): RefundsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            sprintf(self::REFUND_ENDPOINT, $this->getParentResourceId())
        );

        return new RefundsResponse($response);
    }
}
