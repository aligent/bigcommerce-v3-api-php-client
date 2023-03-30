<?php

namespace BigCommerce\Tests\Api\Webhooks;

use BigCommerce\Tests\BigCommerceApiTest;

class WebhookEventsApiTest extends BigCommerceApiTest
{
    public function testCanGetAllEvents()
    {
        $this->setReturnData('webhooks__events__get_all.json');
        $events = $this->getApi()->webhooks()->events()->getAll()->getEvents();

        $this->assertEquals('store/sku/inventory/updated', $events[0]->scope);
    }
}
