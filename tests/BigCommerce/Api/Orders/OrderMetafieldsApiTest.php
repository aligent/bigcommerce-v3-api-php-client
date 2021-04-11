<?php

namespace BigCommerce\Tests\Api\Orders;

use BigCommerce\Tests\BigCommerceApiTest;

class OrderMetafieldsApiTest extends BigCommerceApiTest
{
    public function testCanGetOrderMetafield(): void
    {
        $this->setReturnData('orders__2__metafields__3__get.json');

        $this->getApi()->order(2)->metafield(3)->get();
        $this->assertEquals('orders/2/metafields/3', $this->getLastRequestPath());
    }

    public function testCanGetAllOrderMetafields(): void
    {
        $this->setReturnData('orders__1__metafields__get_all.json');

        $response = $this->getApi()->order(1)->metafields()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('orders/1/metafields', $this->getLastRequestPath());
    }
}
