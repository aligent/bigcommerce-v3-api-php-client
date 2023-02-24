<?php

namespace BigCommerce\Tests\Api\Pages;

use BigCommerce\Tests\BigCommerceApiTest;

class PagesApiTest extends BigCommerceApiTest
{
    public function testCanGetPage()
    {
        $this->setReturnData('pages__2__get.json');
        $page = $this->getApi()->page(2)->get()->getPage();

        $this->assertEquals('Shipping & Returns', $page->name);
    }

    public function testCanGetAll()
    {
        $this->setReturnData('pages__get_all.json');
        $pages = $this->getApi()->pages()->getAll()->getPages();

        $this->assertEquals('fullname,companyname,phone,orderno,rma', $pages[2]->contact_fields);
    }
}
