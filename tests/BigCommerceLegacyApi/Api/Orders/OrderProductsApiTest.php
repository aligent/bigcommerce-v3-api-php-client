<?php

namespace BigCommerce\Tests\V2\Api\Orders;

use BigCommerce\Tests\V2\V2ApiClientTest;

class OrderProductsApiTest extends V2ApiClientTest
{
    public function testCanGetProductsForOrder()
    {
        $this->setReturnData('orders_v2__149__products__get_all.json');

        $orderProducts = $this->getApi()->order(149)->products()->getAll();

        $this->assertCount(2, $orderProducts);
        $this->assertEquals('Fog Linen Chambray Towel - Beige Stripe', $orderProducts[0]->name);
        $this->assertEquals('Size', $orderProducts[0]->product_options[0]->display_name);
    }
}
