<?php

namespace BigCommerce\Tests\Api\Customers;

use BigCommerce\Tests\BigCommerceApiTest;

class CustomerSettingsApiTest extends BigCommerceApiTest
{
    public function testCanGetCustomerSettings()
    {
        $this->setReturnData('customers__settings__get.json');

        $settings = $this->getApi()->customers()->settings()->get()->getCustomerSettings();

        $this->assertEquals('https://bigcommmerce.com/policy', $settings->privacy_settings->policy_url);
    }

    public function testCanGetCustomerSettingsPerChannel()
    {
        $this->setReturnData('customers__settings__by_channel.json');
        $settings = $this->getApi()->customers()->settings()->channel(1)->get()->getChannelSettings();

        $this->assertEquals('https://aligent.com.au/takeflight', $settings->privacy_settings->policy_url);
    }
}
