<?php

namespace BigCommerce\Tests\Api\Catalog;

use BigCommerce\ApiV3\Api\Catalog\Brands\BrandImageApi;
use BigCommerce\ApiV3\Api\Catalog\Brands\BrandMetafieldsApi;
use BigCommerce\Tests\BigCommerceApiTest;

class BrandsApiTest extends BigCommerceApiTest
{
    public function testCanSetBrandId(): void
    {
        $expectedId = 1234;
        $brandApi = $this->getApi()->catalog()->brand($expectedId);
        $this->assertEquals($expectedId, $brandApi->getResourceId());
    }

    public function testCanGet(): void
    {
        $this->setReturnData('catalog__brands__50__get.json');
        $brandResponse = $this->getApi()->catalog()->brand(50)->get();
        $this->assertEquals('Common Good', $brandResponse->getBrand()->name);
    }

    public function testCanGetAll(): void
    {
        $this->setReturnData('catalog__brands__get_all.json');
        $brandsResponse = $this->getApi()->catalog()->brands()->getAll();
        $this->assertEquals(15, $brandsResponse->getPagination()->total);
        $this->assertCount(15, $brandsResponse->getBrands());
    }

    public function testCanGetAllPages(): void
    {
        $this->setReturnData('catalog__brands__get_all.json');
        $brandsResponse = $this->getApi()->catalog()->brands()->getAllPages();
        $this->assertEquals(15, $brandsResponse->getPagination()->total);
        $this->assertCount(15, $brandsResponse->getBrands());
    }

    public function testCanGetBrandImageApi(): void
    {
        $this->assertInstanceOf(
            BrandImageApi::class,
            $this->getApi()->catalog()->brand(1)->image()
        );
    }

    public function testCanGetMetafieldsApi(): void
    {
        $this->assertInstanceOf(
            BrandMetafieldsApi::class,
            $this->getApi()->catalog()->brand(123)->metafields()
        );
    }
}
