<?php

namespace BigCommerce\Tests\Api\Channels;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelCurrencyAssignment;
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

    /**
     * @return ChannelCurrencyAssignment[]
     */
    private function getCurrencyAssignments(): array
    {
        $currencyAssignments = [new ChannelCurrencyAssignment(), new ChannelCurrencyAssignment()];

        $currencyAssignments[0]->channel_id = 1;
        $currencyAssignments[0]->enabled_currencies = ['USD', 'AUD'];
        $currencyAssignments[0]->default_currency = 'AUD';

        $currencyAssignments[0]->channel_id = 2;
        $currencyAssignments[0]->enabled_currencies = ['USD', 'AUD', 'NZD'];
        $currencyAssignments[0]->default_currency = 'NZD';

        return $currencyAssignments;
    }

    private function getCurrencyAssignment(): ChannelCurrencyAssignment
    {
        $currencyAssignment = new ChannelCurrencyAssignment();
        $currencyAssignment->channel_id = 1;
        $currencyAssignment->enabled_currencies = ['AUD', 'NZD', 'CAD'];
        $currencyAssignment->default_currency = 'CAD';

        return $currencyAssignment;
    }

    public function testCanCreateMultipleCurrencyAssignments()
    {
        $this->setReturnData('channel_currency_assignments.json');

        $this->getApi()->channels()->currencyAssignments()->batchCreate($this->getCurrencyAssignments());
        $this->assertEquals('channels/currency-assignments', $this->getLastRequestPath());
    }

    public function testCanUpdateMultipleCurrencyAssignments()
    {
        $this->setReturnData('channel_currency_assignments.json');

        $this->getApi()->channels()->currencyAssignments()->batchUpdate($this->getCurrencyAssignments());
        $this->assertEquals('channels/currency-assignments', $this->getLastRequestPath());
    }

    public function testCanCreateCurrencyAssignment()
    {
        $this->setReturnData('channel_currency_assignments.json');
        $channelId = 1;
        $this->getApi()->channel(1)->currencyAssignments()->create($this->getCurrencyAssignment());
        $this->assertEquals("channels/$channelId/currency-assignments", $this->getLastRequestPath());
    }

    public function testCanUpdateCurrencyAssignment()
    {
        $this->setReturnData('channel_currency_assignments.json');
        $channelId = 1;
        $this->getApi()->channel(1)->currencyAssignments()->update($this->getCurrencyAssignment());
        $this->assertEquals("channels/$channelId/currency-assignments", $this->getLastRequestPath());
    }
}
