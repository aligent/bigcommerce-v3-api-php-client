<?php
namespace BigCommerce\Tests\Catalog;

use BigCommerce\Tests\BigCommerceApiTest;

class CategoriesApiTest extends BigCommerceApiTest
{
    public function testCategoryIdIsSet(): void
    {
        $expectedCategoryId = 1025;
        $categoryApi = $this->getApi()->catalog()->category($expectedCategoryId);
        $this->assertEquals($expectedCategoryId, $categoryApi->getResourceId());
    }

    public function testCanGetCategories(): void
    {
        $this->setReturnData('catalog__categories__39__get.json');
        $categoryResponse = $this->getApi()->catalog()->category(39)->get();
        $this->assertEquals(39, $categoryResponse->getCategory()->id);
    }

    public function testCanGetCategory(): void
    {
        $this->setReturnData('catalog__categories__get_all.json');
        $categoriesResponse = $this->getApi()->catalog()->categories()->getAll();
        $this->assertEquals(6, $categoriesResponse->getPagination()->total);
        $this->assertCount(6, $categoriesResponse->getCategories());
    }

}