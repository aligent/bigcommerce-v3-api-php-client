<?php

namespace BigCommerce\Tests\V2\Api\Carts;

use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV2\ResourceModels\Order\OrderProduct;
use BigCommerce\Tests\V2\V2ApiClientTest;

class OrdersApiTest extends V2ApiClientTest
{
    public function testCanCreateOrder()
    {
        $this->setReturnData(self::EMPTY_RESPONSE);

        $order = new Order();
        $order->products = [
            OrderProduct::build('test', 1, 12, 10),
        ];

        $this->assertTrue($this->getApi()->orders()->create($order));
        $this->assertEquals('orders', $this->getLastRequestPath());
    }
}
