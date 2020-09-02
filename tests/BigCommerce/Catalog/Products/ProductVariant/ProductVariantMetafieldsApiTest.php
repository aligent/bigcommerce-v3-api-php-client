<?php

namespace BigCommerce\ApiV3\Catalog\Products\ProductVariant;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductVariantMetafieldsApiTest extends BigCommerceApiTest
{
    public function testHasProductVariantAndMetafieldIds()
    {
        $expectedProductId   = 687;
        $expectedVariantId   = 3;
        $expectedMetafieldId = 1990;

        $metafieldsApi = $this->getApi()
            ->catalog()->product($expectedProductId)->variant($expectedVariantId)->metafield($expectedMetafieldId);
        $this->assertEquals($expectedVariantId, $metafieldsApi->getParentResourceId());
        $this->assertEquals($expectedMetafieldId, $metafieldsApi->getResourceId());
        $this->assertEquals($expectedProductId, $metafieldsApi->getProductId());
    }

    public function testCanGetProductVariantMetafield()
    {
        $this->setReturnData('catalog__products__variants__158__metafield__get_8.json');

        $response = $this->getApi()->catalog()->product(1)->variant(158)->metafield(8)->get();
        $this->assertEquals('Shelf 3, Bin 5', $response->getMetafield()->value);
    }

    public function testCanGetAllProductVariantMetafields()
    {
        $this->setReturnData('catalog__products__variants__111__metafield__get_all.json');

        $response = $this->getApi()->catalog()->product(1)->variant(111)->metafields()->getAll();
        $this->assertEquals(3, $response->getPagination()->total);
        $this->assertEquals('Warehouse Locations', $response->getMetafields()[0]->namespace);
    }
}
