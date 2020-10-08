<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\Refund;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class RefundResponse extends SingleResourceResponse
{
    private Refund $refund;

    public function getRefund(): Refund
    {
        return $this->refund;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->refund = new Refund($rawData);
    }
}
