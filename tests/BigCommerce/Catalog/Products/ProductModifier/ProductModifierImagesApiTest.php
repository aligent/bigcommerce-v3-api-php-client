<?php


namespace BigCommerce\ApiV3\Catalog\Products\ProductModifier;


use BigCommerce\Tests\BigCommerceApiTest;

class ProductModifierImagesApiTest extends BigCommerceApiTest
{
    public function testHasProductModifierAndImageId(): void
    {
        $expectedProductId  = 687;
        $expectedModifierId = 3;
        $expectedImageId    = 1990;

        $modifierImagesApi = $this->getApi()
            ->catalog()->product($expectedProductId)->modifier($expectedModifierId)->image($expectedImageId);
        $this->assertEquals($expectedModifierId, $modifierImagesApi->getParentResourceId());
        $this->assertEquals($expectedImageId, $modifierImagesApi->getResourceId());
        $this->assertEquals($expectedProductId, $modifierImagesApi->getProductId());
    }

    public function testCanCreateImage()
    {
        $this->markTestIncomplete();
    }

    public function testCanDeleteImage()
    {
        $this->markTestIncomplete();
    }
}