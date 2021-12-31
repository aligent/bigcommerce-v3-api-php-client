<?php

namespace BigCommerce\Tests\V2\Api\Orders;

use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV2\ResourceModels\Order\OrderProduct;
use BigCommerce\Tests\V2\V2ApiClientTest;

class OrdersApiTest extends V2ApiClientTest
{
    public function testCanCreateOrder()
    {
        $this->setReturnData('orders_v2_create.json');

        $order = new Order();
        $order->products = [
            OrderProduct::build('test', 1, 12, 10),
        ];

        $response = $this->getApi()->orders()->create($order);
        $this->assertEquals(218, $response->id);
        $this->assertEquals('orders', $this->getLastRequestPath());
    }

    public function testCanGetOrder()
    {
        $this->setReturnData('orders_v2__101__get.json');
        $orderResponse = $this->getApi()->order(101)->get();

        $this->assertEquals(101, $orderResponse->id);
        $this->assertEquals('321 Main Street', $orderResponse->billing_address->street_1);
    }

    public function testCanGetOrders()
    {
        $this->setReturnData('orders_v2__get_all.json');
        $orders = $this->getApi()->orders()->getAll([], 1, 3);

        $this->assertEquals('123 Main Street', $orders[2]->billing_address->street_1);
    }

    public function testCanGetOrderCount()
    {
        $this->setReturnData('orders_v2__get_order_count.json');
        $orderCount = $this->getApi()->orders()->count();
        $this->assertEquals(1, $orderCount->statuses['Shipped']->count);
        $this->assertEquals(13, $orderCount->count);
    }
}
