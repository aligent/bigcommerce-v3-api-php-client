<?php

namespace BigCommerce\ApiV3\ResponseModels\Channel;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

/**
 * Note this doesn't seem to be used by the API currently, it returns an array of assignments always. This class
 * is included for completeness
 */
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
