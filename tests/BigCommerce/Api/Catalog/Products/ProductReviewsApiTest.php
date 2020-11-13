<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductReviewsApiTest extends BigCommerceApiTest
{
    public function testHasProductAndReviewId(): void
    {
        $expectedProductId = 687;
        $expectedReviewId = 3;

        $variantApi = $this->getApi()->catalog()->product($expectedProductId)->review($expectedReviewId);
        $this->assertEquals($expectedProductId, $variantApi->getParentResourceId());
        $this->assertEquals($expectedReviewId, $variantApi->getResourceId());
    }

    public function testCanGetReview(): void
    {
        $this->setReturnData('catalog__products__226__reviews__824__get.json');

        $response = $this->getApi()->catalog()->product(226)->review(824)->get();
        $this->assertEquals('Great Review', $response->getReview()->title);
    }

    public function testCanGetAllReviews(): void
    {
        $this->setReturnData('catalog__products__1__reviews__get_all.json');

        $response = $this->getApi()->catalog()->product(11)->reviews()->getAll();
        $this->assertEquals(1, $response->getPagination()->total);
        $this->assertEquals(5, $response->getReviews()[0]->rating);
    }
}
