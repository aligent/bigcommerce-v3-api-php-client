<?php
namespace BigCommerce\Tests\Catalog\Brands;

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
    }

    public function testCanGetAllProductVariants(): void
    {
        $this->setReturnData('catalog__brands__11__metafields__get_all.json');

        $response = $this->getApi()->catalog()->brand(11)->metafields()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('Warehouse Locations', $response->getMetafields()[0]->namespace);
    }
}
