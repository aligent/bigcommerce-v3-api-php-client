<?php

namespace BigCommerce\Tests\Api\PriceLists;

use BigCommerce\ApiV3\Api\PriceLists\PriceListRecordsApi;
use BigCommerce\Tests\BigCommerceApiTest;

class PriceListRecordsApiTest extends BigCommerceApiTest
{
    public function canGetRecordsApi()
    {
        $this->assertInstanceOf(PriceListRecordsApi::class, $this->getApi()->priceList(1)->records());
    }

    public function testCanGetAllRecords()
    {
        $this->setReturnData('price_lists__3__records__get_all.json');
        $priceListResponse = $this->getApi()->priceList(3)->records()->getAll();
        $this->assertEquals(14, $priceListResponse->getPagination()->total);
    }

    public function testCanGetAllForVariant()
    {
        $this->setReturnData('price_lists__3__records__by_variant_388.json');
        $priceListResponse = $this->getApi()->priceList(3)->records()->getAllByVariant(388);
        $this->assertEquals(1, $priceListResponse->getPagination()->total);
    }

    public function testCanDeleteRecords()
    {
        $this->markTestIncomplete();
    }

    public function testCanDeleteRecordByCurrencyCode()
    {
        $this->markTestIncomplete();
    }

    public function testCanGetRecordByCurrencyCode()
    {
        $this->setReturnData('price_lists__4__records__by_variant__356__currency__eur.json');
        $priceListResponse = $this->getApi()->priceList(4)->records()->getByCurrencyCode(356, 'eur');
        $this->assertEquals(22.544, $priceListResponse->getRecord()->price);
    }

    public function testCanUpsertRecords()
    {
        $this->markTestIncomplete();
    }
}
