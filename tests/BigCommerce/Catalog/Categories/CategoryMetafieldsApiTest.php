<?php


namespace BigCommerce\Tests\Catalog\Categories;


use BigCommerce\Tests\BigCommerceApiTest;

class CategoryMetafieldsApiTest extends BigCommerceApiTest
{
    public function testHasSetCategoryAndMetafieldId(): void
    {
        $brandId = 678;
        $metafieldId = 8495;

        $api = $this->getApi()->catalog()->brand($brandId)->metafield($metafieldId);
        $this->assertEquals($brandId, $api->getParentResourceId());
        $this->assertEquals($metafieldId, $api->getResourceId());
    }

    public function testCanGetCategoryMetafield(): void
    {
        $this->markTestIncomplete();
    }

    public function testCanGetCategoryMetafields(): void
    {
        $this->markTestIncomplete();
    }


}