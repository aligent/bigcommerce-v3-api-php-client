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
        $this->markTestIncomplete();
    }

    public function testCanGetAllProductVariantMetafields()
    {
        $this->markTestIncomplete();
    }
}