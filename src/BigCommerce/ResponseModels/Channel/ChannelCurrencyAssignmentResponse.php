<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelCurrencyAssignmentResponse extends SingleResourceResponse
{
    private ChannelCurrencyAssignment $currencyAssignment;

    public function getCurrencyAssignment(): ChannelCurrencyAssignment
    {
        return $this->currencyAssignment;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->currencyAssignment = new ChannelCurrencyAssignment($rawData);
    }
}
