<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductImage;
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
        $productId = 158;
        $this->setReturnData('catalog__products__158__images__get_all.json');

        $imageResponse = $this->getApi()->catalog()->product($productId)->images()->getAll();

        $this->assertEquals(2, $imageResponse->getPagination()->total);
        $this->assertCount(2, $imageResponse->getProductImages());
        $this->assertEquals($productId, $imageResponse->getProductImages()[0]->product_id);
    }

    public function testCanCreateImage(): void
    {
        $productId = 158;
        $imageId   = 485;
        $this->setReturnData('catalog__products__158__images__485__get.json');

        $productImage = new ProductImage();
        $productImage->is_thumbnail = true;
        $productImage->sort_order   = 1;
        $productImage->description  = "Something";
        $productImage->image_url    = "https://this-image.png";

        $imageResponse = $this->getApi()->catalog()->product($productId)->images()->create($productImage);
        $this->assertEquals($imageId, $imageResponse->getProductImage()->id);
    }
}
