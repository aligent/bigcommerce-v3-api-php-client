<?php


namespace BigCommerce\Tests\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductImagesApiTest extends BigCommerceApiTest
{
    public function testHasProductAndImageId(): void
    {
        $expectedProductId = 12;
        $expectedImageId = 32;

        $imageApi = $this->getApi()->catalog()->product($expectedProductId)->image($expectedImageId);
        $this->assertEquals($expectedProductId, $imageApi->getParentResourceId());
        $this->assertEquals($expectedImageId, $imageApi->getResourceId());
    }

    public function testCanGetImage(): void
    {
        $productId = 158;
        $imageId   = 485;
        $this->setReturnData('catalog__products__158__images__485__get.json');

        $imageResponse = $this->getApi()->catalog()->product($productId)->image($imageId)->get();
        $this->assertEquals($productId, $imageResponse->getProductImage()->product_id);
        $this->assertEquals($imageId, $imageResponse->getProductImage()->id);
    }

    public function testCanGetAllImages(): void
    {
        $this->markTestIncomplete();
    }

    public function testCanCreateImage(): void
    {
        $this->markTestIncomplete();
    }
}
