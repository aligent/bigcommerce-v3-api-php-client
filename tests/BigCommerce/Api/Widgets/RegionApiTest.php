<?php

namespace BigCommerce\Tests\Api\Widgets;

use BigCommerce\Tests\BigCommerceApiTest;

class RegionApiTest extends BigCommerceApiTest
{
    public function testCanGetRegions(): void
    {
        $this->setReturnData('content__regions__get.json');

        $regions = $this->getApi()->widgets()->regions('pages/home')->get()->getRegions();
        $this->assertCount(2, $regions);
        $this->assertEquals('category_header_banner', $regions[1]->name);
    }
}
