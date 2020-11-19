<?php

namespace BigCommerce\ApiV3\Api\Payments;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\Order\Order;
use BigCommerce\ApiV3\ResponseModels\Payment\AcceptedPaymentMethodsResponse;
use BigCommerce\ApiV3\ResponseModels\Payment\PaymentAccessTokenResponse;
use GuzzleHttp\RequestOptions;

class PaymentsProcessingApi extends V3ApiBase
{
    private const PAYMENTS_ENDPOINT = 'payments/';
    private const ACCESS_TOKENS_ENDPOINT   = self::PAYMENTS_ENDPOINT . 'access_tokens';
    private const PAYMENT_METHODS_ENDPOINT = self::PAYMENTS_ENDPOINT . 'methods';

    public function createToken(Order $order): PaymentAccessTokenResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            self::ACCESS_TOKENS_ENDPOINT,
            [
                RequestOptions::JSON => json_encode($order),
            ]
        );

        return new PaymentAccessTokenResponse($response);
    }

    public function paymentMethods(int $orderId): AcceptedPaymentMethodsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            self::PAYMENT_METHODS_ENDPOINT,
            [
                RequestOptions::QUERY => [
                    'order_id' => $orderId,
                ]
            ]
        );

        return new AcceptedPaymentMethodsResponse($response);
    }
}
