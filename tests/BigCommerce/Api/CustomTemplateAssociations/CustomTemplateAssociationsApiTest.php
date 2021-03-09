<?php

namespace BigCommerce\Tests\Api\CustomTemplateAssociation;

use BigCommerce\Tests\BigCommerceApiTest;


class CustomTemplateAssociationsApiTest extends BigCommerceApiTest
{
    public function testCanGetAssociations()
    {
        $this->setReturnData('templates__get_all.json');

        $response = $this->getApi()->customTemplateAssociations()->getAll();
        $this->assertEquals(5, $response->getPagination()->count);
        $this->assertEquals('custom-product-1.html', $response->getCustomTemplateAssociations()[0]->file_name);
    }

    public function testCanDeleteAssociation()
    {
        $this->markTestIncomplete();
    }

    public function testCanUpsertAssociation()
    {
        $this->markTestIncomplete();
    }
}
