<?php

namespace BigCommerce\Tests\Api\Widgets;

use BigCommerce\Tests\BigCommerceApiTest;

class PlacementsApiTest extends BigCommerceApiTest
{
    public function testCanGetPlacement(): void
    {
        $this->setReturnData('content__placements__get.json');

        $placement = $this->getApi()
            ->widgets()->placement('bb34b23b-0d4b-4b9b-9e24-c8b0dcfd5e08')->get()->getPlacement();

        $this->assertEquals('pages/category', $placement->template_file);
    }
}
