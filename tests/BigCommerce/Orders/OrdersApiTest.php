<?php

namespace BigCommerce\Tests\Orders;

use BigCommerce\ApiV3\Orders\OrdersApi;
use BigCommerce\Tests\BigCommerceApiTest;

class OrdersApiTest extends BigCommerceApiTest
{
    public function testCanGetOrdersApi()
    {
        $orderId = 123;

        $ordersApi = $this->getApi()->order($orderId);
        $this->assertInstanceOf(OrdersApi::class, $ordersApi);
        $this->assertEquals($orderId, $ordersApi->getResourceId());
    }
}
