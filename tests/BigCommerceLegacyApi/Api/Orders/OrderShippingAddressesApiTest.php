<?php

namespace BigCommerce\Tests\V2\Api\Orders;

use BigCommerce\Tests\V2\V2ApiClientTest;

class OrderShippingAddressesApiTest extends V2ApiClientTest
{
    public function testCanGetShippingAddress()
    {
        $this->markTestIncomplete();
    }

    public function testCanGetShippingAddresses()
    {
        $this->setReturnData('orders_v2__229__shipping_addresses__get_all.json');
        $addresses = $this->getApi()->order(229)->shippingAddresses()->getAll();

        $this->assertCount(2, $addresses);
        $this->assertEquals('555 Main Street', $addresses[1]->street_1);
    }
}
