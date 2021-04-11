<?php

namespace BigCommerce\Tests\Api\Subscribers;

use BigCommerce\Tests\BigCommerceApiTest;

class SubscribersApiTest extends BigCommerceApiTest
{
    public function testCanGetSubscriber(): void
    {
        $this->markTestIncomplete();
    }

    public function testCanGetSubscribers(): void
    {
        $this->setReturnData('no-data-paginated.json');

        $this->getApi()->customers()->subscribers()->getAll()->getSubscribers();
        $this->assertEquals('customers/subscribers', $this->getLastRequestPath());
    }
}
