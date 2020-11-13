<?php

namespace BigCommerce\Tests\Api\Catalog\Categories;

use BigCommerce\Tests\BigCommerceApiTest;

class CategoryImageApiTest extends BigCommerceApiTest
{
    public function testCanCreateImage(): void
    {
        $this->setReturnData('catalog__categories__1__image__create.json');
        $response = $this->getApi()
            ->catalog()
            ->category(1)
            ->image()
            ->create(self::REQUESTS_PATH . 'orange-catalog-icon-1.png');

        $this->assertEquals(
            'https://cdn11.bigcommerce.com/s-{store_hash}/product_images/k/group_1545334669__76009.png',
            $response
        );
    }
}
