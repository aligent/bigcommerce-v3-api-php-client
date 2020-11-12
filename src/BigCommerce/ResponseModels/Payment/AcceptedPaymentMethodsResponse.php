<?php

namespace BigCommerce\ApiV3\ResponseModels\Payment;

use BigCommerce\ApiV3\ResourceModels\Payment\PaymentMethod;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class AcceptedPaymentMethodsResponse extends PaginatedResponse
{
    /**
     * @return PaymentMethod[]
     */
    public function getMethods(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return PaymentMethod::class;
    }
}
