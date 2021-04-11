<?php

namespace BigCommerce\Tests\Api\Catalog\Brands;

use BigCommerce\Tests\BigCommerceApiTest;

class BrandMetafieldsApiTest extends BigCommerceApiTest
{
    public function testHasBrandAndMetafieldId(): void
    {
        $expectedBrandId = 687;
        $expectedVMetafieldId = 3;

        $variantApi = $this->getApi()->catalog()->brand($expectedBrandId)->metafield($expectedVMetafieldId);
        $this->assertEquals($expectedBrandId, $variantApi->getParentResourceId());
        $this->assertEquals($expectedVMetafieldId, $variantApi->getResourceId());
    }

    public function testCanGetBrandMetafield(): void
    {
        $this->setReturnData('catalog__brands__158__metafields__8__get.json');

        $response = $this->getApi()->catalog()->brand(158)->metafield(8)->get();
        $this->assertEquals('Shelf 3, Bin 5', $response->getMetafield()->value);
        $this->assertEquals('catalog/brands/158/metafields/8', $this->getLastRequestPath());
    }

    public function testCanGetAllBrandMetafields(): void
    {
        $this->setReturnData('catalog__brands__11__metafields__get_all.json');

        $response = $this->getApi()->catalog()->brand(11)->metafields()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('Warehouse Locations', $response->getMetafields()[0]->namespace);
        $this->assertEquals('catalog/brands/11/metafields', $this->getLastRequestPath());
    }
}
