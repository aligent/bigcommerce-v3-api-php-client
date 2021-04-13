<?php

namespace BigCommerce\Tests\Api\Channels;

use BigCommerce\Tests\BigCommerceApiTest;

class ChannelCurrencyAssignmentsApiTest extends BigCommerceApiTest
{
    public function testCanGetCurrencyAssignment()
    {
        $this->setReturnData('channel_currency_assignments.json');
        $channelId = 1;

        $currencyAssignments = $this->getApi()
            ->channel($channelId)->currencyAssignments()->getAll()->getCurrencyAssignments();
        $this->assertEquals("channels/$channelId/currency-assignments", $this->getLastRequestPath());
        $this->assertEquals('AUD', $currencyAssignments[0]->default_currency);
    }

    public function testCanGetAllChannelsCurrencyAssignments()
    {
        $this->setReturnData('channel_currency_assignments.json');
        $currencyAssignments = $this->getApi()->channels()->currencyAssignments()->getAll()->getCurrencyAssignments();
        $this->assertEquals('channels/currency-assignments', $this->getLastRequestPath());
        $this->assertEquals('AUD', $currencyAssignments[0]->default_currency);
    }
}
