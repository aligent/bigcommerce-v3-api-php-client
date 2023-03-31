<?php

namespace BigCommerce\Tests\Api\Catalog;

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
        $productResponse = $this->getApi()->catalog()->product(174)->get(null, ['weight', 'width']);
        $this->assertEquals(174, $productResponse->getProduct()->id);
        $this->assertEquals('include_fields=weight%2Cwidth', $this->getLastRequest()->getUri()->getQuery());
    }

    public function testCanGetProductWithoutError(): void
    {
        $this->setReturnData('catalog__products__77__get.json');
        $product = $this->getApi()->catalog()->product(77)->get()->getProduct();
        $this->assertEquals(77, $product->id);
        $this->assertEquals('SLCTBS', $product->sku);
    }

    public function testCanGetAllPagesForProducts(): void
    {
        $this->setReturnData('catalog__products__get_all.json');

        $productsResponse = $this->getApi()->catalog()->products()->getAllPages();
        $this->assertEquals(2, $productsResponse->getPagination()->total);
    }

    public function testCanBatchDeleteProducts(): void
    {
        $this->setReturnData('blank.json', 204);
        $response = $this->getApi()->catalog()->products()->batchDelete([1,2,3]);
        $this->assertTrue($response);
    }

    public function testCanFailToDeleteBatchDeleteProducts(): void
    {
        $this->setReturnData(self::EMPTY_RESPONSE, 400);
        $response = $this->getApi()->catalog()->products()->batchDelete([1,2,3]);
        $this->assertFalse($response);
    }
}
