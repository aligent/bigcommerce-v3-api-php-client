<?php

namespace BigCommerce\Tests\Api\Catalog\Categories;

use BigCommerce\Tests\BigCommerceApiTest;

class CategoryMetafieldsApiTest extends BigCommerceApiTest
{
    public function testHasSetCategoryAndMetafieldId(): void
    {
        $categoryId = 678;
        $metafieldId = 8495;

        $api = $this->getApi()->catalog()->category($categoryId)->metafield($metafieldId);
        $this->assertEquals($categoryId, $api->getParentResourceId());
        $this->assertEquals($metafieldId, $api->getResourceId());
    }

    public function testCanGetCategoryMetafield(): void
    {
        $this->setReturnData('catalog__categories__158__metafields__8__get.json');

        $response = $this->getApi()->catalog()->category(158)->metafield(8)->get();
        $this->assertEquals('Shelf 3, Bin 5', $response->getMetafield()->value);
    }

    public function testCanGetCategoryMetafields(): void
    {
        $this->setReturnData('catalog__categories__111__metafields__get_all.json');

        $response = $this->getApi()->catalog()->category(111)->metafields()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('Warehouse Locations', $response->getMetafields()[0]->namespace);
    }

    public function testCanSetApiUrlCorrectlyForGetAll(): void
    {
        $this->setReturnData('catalog__categories__111__metafields__get_all.json');
        $this->getApi()->catalog()->category(111)->metafields()->getAll();

        $this->assertEquals('catalog/categories/111/metafields', $this->getLastRequestPath());
    }

    public function testCanSetApiUrlCorrectlyForGet(): void
    {
        $this->setReturnData('catalog__categories__158__metafields__8__get.json');
        $this->getApi()->catalog()->category(158)->metafield(8)->get();

        $this->assertEquals('catalog/categories/158/metafields/8', $this->getLastRequestPath());
    }
}
