<?php

namespace BigCommerce\ApiV3\ResponseModels\Payment;

use BigCommerce\ApiV3\ResourceModels\Payment\PaymentAccessToken;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class PaymentAccessTokenResponse extends SingleResourceResponse
{
    private PaymentAccessToken $token;

    public function getToken(): PaymentAccessToken
    {
        return $this->token;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->token = new PaymentAccessToken($rawData);
    }
}
