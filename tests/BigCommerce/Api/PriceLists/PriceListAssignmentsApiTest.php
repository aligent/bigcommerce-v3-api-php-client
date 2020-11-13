<?php

namespace BigCommerce\Tests\Api\PriceLists;

use BigCommerce\ApiV3\Api\PriceLists\PriceListAssignmentsApi;
use BigCommerce\ApiV3\ResourceModels\PriceList\PriceListAssignment;
use BigCommerce\Tests\BigCommerceApiTest;

class PriceListAssignmentsApiTest extends BigCommerceApiTest
{
    public function testCanGetApi()
    {
        $this->assertInstanceOf(PriceListAssignmentsApi::class, $this->getApi()->priceLists()->assignments());
    }

    public function testCanGetAllPriceLists()
    {
        $this->setReturnData('pricelists__price_list_assignments__get_all.json');

        $priceListAssignmentsResponse = $this->getApi()->priceLists()->assignments()->getAll();
        $this->assertEquals(1, $priceListAssignmentsResponse->getPagination()->total);
    }

    public function testCanDeletePriceLists()
    {
        $this->setReturnData('blank.json', 204);

        $response = $this->getApi()->priceLists()->assignments()->deleteAll([PriceListAssignmentsApi::FILTER_ID => 1]);
        $this->assertEquals(204, $response->getStatusCode());
    }

    public function testCanCreatePriceList()
    {
        $this->setReturnData('blank.json');

        $assignment = new PriceListAssignment((object)[
            'price_list_id'     => 1,
            'customer_group_id' => 1,
            'channel_id'        => 1
        ]);

        $response = $this->getApi()->priceLists()->assignments()->create($assignment);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
