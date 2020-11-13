<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductVideosApiTest extends BigCommerceApiTest
{
    public function testHasProductAndVideoId(): void
    {
        $expectedProductId = 687;
        $expectedVideoId = 3;

        $variantApi = $this->getApi()->catalog()->product($expectedProductId)->video($expectedVideoId);
        $this->assertEquals($expectedProductId, $variantApi->getParentResourceId());
        $this->assertEquals($expectedVideoId, $variantApi->getResourceId());
    }

    public function testCanGetVideo(): void
    {
        $this->setReturnData('catalog__products__1__videos__1__get.json');

        $response = $this->getApi()->catalog()->product(1)->video(1)->get();
        $this->assertEquals('Your Video', $response->getVideo()->title);
    }

    public function testCanGetAllVideos(): void
    {
        $this->setReturnData('catalog__products__192__videos__get_all.json');

        $response = $this->getApi()->catalog()->product(192)->videos()->getAll();
        $this->assertEquals(3, $response->getPagination()->total);
        $this->assertEquals('PqBTp23RLhI', $response->getVideos()[0]->video_id);
    }
}
