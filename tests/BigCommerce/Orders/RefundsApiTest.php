<?php

namespace BigCommerce\Tests\Orders;

use BigCommerce\ApiV3\Orders\RefundsApi;
use BigCommerce\ApiV3\ResourceModels\Order\OrderRefundItem;
use BigCommerce\Tests\BigCommerceApiTest;

class RefundsApiTest extends BigCommerceApiTest
{
    public function testCanGetRefundsApi()
    {
        $orderId = 123;

        $refundsApi = $this->getApi()->order($orderId)->refunds();
        $this->assertInstanceOf(RefundsApi::class, $refundsApi);
        $this->assertEquals($orderId, $refundsApi->getParentResourceId());
    }

    public function testCanCreateQuoteRefund()
    {
        $this->setReturnData('orders__order_refunds__create_quote.json', 201);
        $orderId = 1;

        $response = $this->getApi()->order($orderId)->refunds()->createQuote();
        $this->assertEquals($orderId, $response->getQuote()->order_id);
    }

    public function testCanGetAll()
    {
        $this->markTestIncomplete();
    }

    public function testCanCreateRefund()
    {
        $this->setReturnData('orders__order_refunds__create.json', 201);
        $orderId = 1;
        $reason = 'test reason';

        $item = new OrderRefundItem();
        $item->item_id = 1;
        $item->item_type = OrderRefundItem::ITEM_TYPE__HANDLING;
        $item->quantity = 1;
        $item->reason = "";

        $response     = $this->getApi()->order($orderId)->refunds()->create([$item], $reason);
        $refund       = $response->getRefund();
        $responseItem = $refund->items[0];

        $this->assertEquals($reason, $refund->reason);
        $this->assertInstanceOf(OrderRefundItem::class, $responseItem);
        $this->assertEquals($item->item_id, $responseItem->item_id);
        $this->assertEquals($item->item_type, $responseItem->item_type);
    }
}
