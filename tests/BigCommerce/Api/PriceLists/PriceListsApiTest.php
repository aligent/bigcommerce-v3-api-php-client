<?php

namespace BigCommerce\Tests\Api\PriceLists;

use BigCommerce\ApiV3\Api\PriceLists\PriceListsApi;
use BigCommerce\Tests\BigCommerceApiTest;

class PriceListsApiTest extends BigCommerceApiTest
{
    public function testCanGetPriceListsApi()
    {
        $this->assertInstanceOf(PriceListsApi::class, $this->getApi()->priceLists());
    }

    public function testPriceListIdIsSet()
    {
        $expectedPriceListId = 123;
        $priceLists = $this->getApi()->priceList($expectedPriceListId);

        $this->assertEquals($expectedPriceListId, $priceLists->getResourceId());
    }

    public function testCanGetPriceList()
    {
        $this->setReturnData('price_lists__2__get.json');
        $priceListResponse = $this->getApi()->priceList(2)->get();
        $this->assertEquals('B2B', $priceListResponse->getPriceList()->name);
    }

    public function testCanGetPriceLists()
    {
        $this->setReturnData('price_lists__get_all.json');

        $priceListsResponse = $this->getApi()->priceLists()->getAll();
        $this->assertEquals(3, $priceListsResponse->getPagination()->total);
    }
}
