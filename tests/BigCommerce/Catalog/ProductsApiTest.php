<?php

use BigCommerce\Tests\BigCommerceApiTest;

final class ProductsApiTest extends BigCommerceApiTest
{
    public function testProductIdIsSet(): void
    {
        $expectedProductId = 1;
        $productsApi = $this->getApi()->catalog()->product($expectedProductId);
        $this->assertEquals($expectedProductId, $productsApi->getResourceId());
    }

    public function testProductIdNotSet(): void
    {
        $productsApi = $this->getApi()->catalog()->products();
        $this->assertNull($productsApi->getResourceId());
    }

    public function testCanGetProducts(): void
    {
        $this->setReturnData('catalog__products__get_all.json');

        $productsResponse = $this->getApi()->catalog()->products()->getAll();
        $this->assertEquals(2, $productsResponse->getPagination()->total);
    }

    public function testCanGetProduct(): void
    {
        $this->setReturnData('catalog__products__174__get.json');
        $productResponse = $this->getApi()->catalog()->product(174)->get();
        $this->assertEquals(174, $productResponse->getProduct()->id);
    }

    public function testCanGetAllPagesForProducts(): void
    {
        $this->setReturnData('catalog__products__get_all.json');

        $productsResponse = $this->getApi()->catalog()->products()->getAllPages();
        $this->assertEquals(2, $productsResponse->getPagination()->total);
    }
}
