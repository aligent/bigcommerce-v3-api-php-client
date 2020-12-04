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

    public function testCanGetAllPlacements(): void
    {
        $this->setReturnData('content__placements__get_all.json');

        $placements = $this->getApi()
            ->widgets()->placements()->getAll()->getPlacements();

        $this->assertCount(1, $placements);
        $this->assertEquals(
            '3a1b0044-c9b3-47d3-9929-01ab0c20243b',
            $placements[0]->widget->widget_template->uuid
        );
    }
}
