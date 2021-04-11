<?php

namespace BigCommerce\Tests\Api\Carts;

use BigCommerce\ApiV3\Api\Carts\CartItemsApi;
use BigCommerce\ApiV3\ResourceModels\Cart\CartItem;
use BigCommerce\Tests\BigCommerceApiTest;

class CartItemsApiTest extends BigCommerceApiTest
{
    public function testCanAddCartLineItem()
    {
        $this->setReturnData('carts_get.json', 201);
        $id = 'aae435b7-e8a4-48f2-abcd-ad0675dc3123';

        $lineItem = new CartItem();
        $lineItem->line_items[] = [
            "sku"        => "made-up",
            "name"       => "My product",
            "quantity"   => 33,
            "list_price" => 55
        ];

        $this->getApi()->cart($id)->items()->add($lineItem, CartItemsApi::INCLUDE_REDIRECT_URLS);

        $this->assertEquals("carts/$id/items", $this->getLastRequestPath());
    }

    public function testCanDeleteCartLineItem()
    {
        $this->setReturnData('blank.json', 204);
        $id = 'aae435b7-e8a4-48f2-abcd-ad0675dc3123';
        $lineItemId = '7c0afc28-abcd-42ad-afe6-7a87d6923bc5';

        $this->getApi()->cart($id)->item($lineItemId)->delete();
        $lastRequest = $this->getLastRequest();
        $this->assertEquals("carts/$id/items/$lineItemId", $lastRequest->getUri()->getPath());
        $this->assertEquals('DELETE', $lastRequest->getMethod());
    }
}
