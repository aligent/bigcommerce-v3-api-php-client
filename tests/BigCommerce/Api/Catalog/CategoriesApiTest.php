<?php

namespace BigCommerce\Tests\Api\Catalog;

use BigCommerce\ApiV3\Api\Catalog\Categories\CategoryImageApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryTreeBranch;
use BigCommerce\Tests\BigCommerceApiTest;

class CategoriesApiTest extends BigCommerceApiTest
{
    public function testCanSetCustomUrl(): void
    {
        $category = new Category();
        $category->setCustomUrl('/my-slug');
        $this->assertTrue($category->custom_url->is_customized);
        $this->assertEquals('/my-slug', $category->custom_url->url);
    }

    public function testCategoryIdIsSet(): void
    {
        $expectedCategoryId = 1025;
        $categoryApi = $this->getApi()->catalog()->category($expectedCategoryId);
        $this->assertEquals($expectedCategoryId, $categoryApi->getResourceId());
    }

    public function testCanGetCategory(): void
    {
        $this->setReturnData('catalog__categories__39__get.json');
        $categoryResponse = $this->getApi()->catalog()->category(39)->get();
        $this->assertEquals(39, $categoryResponse->getCategory()->id);
    }

    public function testCanGetCategories(): void
    {
        $this->setReturnData('catalog__categories__get_all.json');
        $categoriesResponse = $this->getApi()->catalog()->categories()->getAll();
        $this->assertEquals(6, $categoriesResponse->getPagination()->total);
        $this->assertCount(6, $categoriesResponse->getCategories());
    }

    public function testCanGetImageApi(): void
    {
        $imageApi = $this->getApi()->catalog()->category(123)->image();
        $this->assertInstanceOf(CategoryImageApi::class, $imageApi);
        $this->assertEquals(123, $imageApi->getParentResourceId());
    }

    public function testCanGetAllCategoryPages(): void
    {
        $this->setReturnData('catalog__categories__get_all.json');
        $categoriesResponse = $this->getApi()->catalog()->categories()->getAllPages();
        $this->assertEquals(6, $categoriesResponse->getPagination()->total);
        $this->assertCount(6, $categoriesResponse->getCategories());
    }

    public function testCanGetCategoryTree(): void
    {
        $this->setReturnData('catalog__categories__get_tree.json');

        $expectedTree = [
            new CategoryTreeBranch((object)[
                "id" => 23,
                "parent_id" => 0,
                "name" => "Shop All",
                "is_visible" => true,
                "url" => "/shop-all/",
                "children" => [],
            ]),
            new CategoryTreeBranch((object)[
                "id" => 18,
                "parent_id" =>  0,
                "name" => "Bath",
                "is_visible" => true,
                "url" => "/bath/",
                "children" => [
                    new CategoryTreeBranch((object)[
                        "id" => 24,
                        "parent_id" => 18,
                        "name" => "Small Baths",
                        "is_visible" => true,
                        "url" => "/bath/small-baths/",
                        "children" => [
                            new CategoryTreeBranch((object)[
                                "id" => 25,
                                "parent_id" => 24,
                                "name" => "Small Red Baths",
                                "is_visible" => true,
                                "url" => "/bath/small-baths/small-red-baths/",
                                "children" => []
                            ])
                        ]
                    ])
                ]
            ]),
            new CategoryTreeBranch((object)[
                "id" => 19,
                "parent_id" => 0,
                "name" => "Garden",
                "is_visible" => true,
                "url" => "/garden/",
                "children" => []
            ]),
            new CategoryTreeBranch((object)[
                "id" => 21,
                "parent_id" => 0,
                "name" => "Kitchen",
                "is_visible" => true,
                "url" => "/kitchen/",
                "children" => []
            ]),
            new CategoryTreeBranch((object)[
                "id" => 20,
                "parent_id" => 0,
                "name" => "Publications",
                "is_visible" => true,
                "url" => "/publications/",
                "children" => []
            ]),
            new CategoryTreeBranch((object)[
                "id" => 22,
                "parent_id" => 0,
                "name" => "Utility",
                "is_visible" => true,
                "url" => "/utility/",
                "children" => []
            ])
        ];

        $response = $this->getApi()->catalog()->categories()->getCategoryTree()->getTree();

        $this->assertEquals($expectedTree, $response);
    }
}
