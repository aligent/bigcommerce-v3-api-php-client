<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductMetafieldsApiTest extends BigCommerceApiTest
{
    public function testHasProductAndMetafieldId(): void
    {
        $expectedProductId = 687;
        $expectedMetafieldId = 3;

        $variantApi = $this->getApi()->catalog()->product($expectedProductId)->metafield($expectedMetafieldId);
        $this->assertEquals($expectedProductId, $variantApi->getParentResourceId());
        $this->assertEquals($expectedMetafieldId, $variantApi->getResourceId());
    }

    public function testCanGetProductMetafield(): void
    {
        $this->setReturnData('catalog__brands__158__metafields__8__get.json');

        $response = $this->getApi()->catalog()->product(158)->metafield(8)->get();
        $this->assertEquals('Shelf 3, Bin 5', $response->getMetafield()->value);
    }

    public function testCanGetAllProductMetafields(): void
    {
        $this->setReturnData('catalog__brands__11__metafields__get_all.json');

        $response = $this->getApi()->catalog()->product(11)->metafields()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('Warehouse Locations', $response->getMetafields()[0]->namespace);
    }
}
