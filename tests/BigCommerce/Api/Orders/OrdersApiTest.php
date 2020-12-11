<?php

namespace BigCommerce\Tests\Api\Orders;

use BigCommerce\ApiV3\Api\Orders\OrdersApi;
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

    public function testCanGetOrderTransactions()
    {
        $this->setReturnData('orders__transactions__get.json');
        $orderId = 121;

        $transactionsResponse = $this->getApi()->order($orderId)->transactions();
        $this->assertCount(1, $transactionsResponse->getTransactions());
        $this->assertEquals(1, $transactionsResponse->getPagination()->total);
    }
}
