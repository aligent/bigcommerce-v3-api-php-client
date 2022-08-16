<?php

namespace BigCommerce\Tests\Api\Carts;

use BigCommerce\ApiV3\Api\Carts\CartsApi;
use BigCommerce\ApiV3\ResourceModels\Cart\Cart;
use BigCommerce\Tests\BigCommerceApiTest;

class CartsApiTest extends BigCommerceApiTest
{
    public function testCanGetCart()
    {
        $this->setReturnData('carts_get.json');

        $id = 'aae435b7-e8a4-48f2-abcd-ad0675dc3123';
        $cart = $this->getApi()->cart($id)->get()->getCart();
        $this->assertEquals(1815, $cart->cart_amount);
        $this->assertEquals("carts/$id", $this->getLastRequestPath());
    }

    public function testCanGetCartWithInclude()
    {
        $this->setReturnData('carts_get.json');

        $id = 'aae435b7-e8a4-48f2-abcd-ad0675dc3123';
        $include = CartsApi::INCLUDE_PHYSICAL_ITEMS;
        $cart = $this->getApi()->cart($id)->get($include)->getCart();
        $this->assertEquals(1815, $cart->cart_amount);
        $this->assertEquals("carts/$id", $this->getLastRequestPath());
    }

    public function testCanCreateACart()
    {
        $this->setReturnData('carts_get.json', 201);
        $cart = new Cart();

        $this->getApi()->carts()->create($cart);
        $this->assertEquals("carts", $this->getLastRequestPath());
    }

    public function testCanCreateACartWithInclude()
    {
        $this->setReturnData('carts_get.json', 201);
        $cart = new Cart();
        $include = CartsApi::INCLUDE_PHYSICAL_ITEMS;

        $this->getApi()->carts()->create($cart, $include);
        $this->assertEquals("carts", $this->getLastRequestPath());
    }

    public function testCanUpdateCustomerIdForCart()
    {
        $this->setReturnData('carts_get.json', 201);
        $id = 'aae435b7-e8a4-48f2-abcd-ad0675dc3123';

        $this->getApi()->cart($id)->updateCustomerId(3);

        $this->assertEquals("carts/$id", $this->getLastRequestPath());
        $this->assertEquals(json_encode(['customer_id' => 3]), $this->getLastRequest()->getBody());
        $this->markTestIncomplete();
    }
}
