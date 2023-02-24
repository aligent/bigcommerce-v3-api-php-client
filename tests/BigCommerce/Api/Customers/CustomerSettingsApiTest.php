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
}
