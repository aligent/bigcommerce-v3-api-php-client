<?php

namespace BigCommerce\Tests\Api\Catalog;

use BigCommerce\Tests\BigCommerceApiTest;

class SummaryApiTest extends BigCommerceApiTest
{
    public function testCanGetSummary(): void
    {
        $this->setReturnData('catalog__summary__get.json');

        $this->assertEquals(
            'Shop All',
            $this->getApi()->catalog()->summary()->get()->getSummary()->primary_category_name
        );
    }
}
