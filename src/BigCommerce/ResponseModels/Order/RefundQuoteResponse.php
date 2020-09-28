<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\RefundQuote;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class RefundQuoteResponse extends SingleResourceResponse
{
    private RefundQuote $quote;

    public function getQuote(): RefundQuote
    {
        return $this->quote;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->quote = new RefundQuote($rawData);
    }
}
