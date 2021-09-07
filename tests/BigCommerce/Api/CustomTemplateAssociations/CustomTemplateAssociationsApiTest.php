<?php

namespace BigCommerce\Tests\Api\CustomTemplateAssociations;

use BigCommerce\ApiV3\Api\CustomTemplateAssociations\CustomTemplateAssociationsApi;
use BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation\CustomTemplateAssociation;
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
        $this->setReturnData(self::EMPTY_RESPONSE, 204);

        $customTemplateAssocApi = $this->getApi()->customTemplateAssociations();
        $customTemplateAssocApi->deleteByChannelId(1);
        $this->setReturnData(self::EMPTY_RESPONSE, 204);
        $customTemplateAssocApi->deleteByIds([1, 2, 3]);
        $this->setReturnData(self::EMPTY_RESPONSE, 204);
        $customTemplateAssocApi->deleteByEntityIds(CustomTemplateAssociation::TYPE_CATEGORY, [4, 5, 6]);
        $this->assertTrue(true);
    }

    public function testCanUpsertAssociation()
    {
        $this->setReturnData('templates__get_all.json');
        $templateAssociationOne = new CustomTemplateAssociation((object)[
            "id"            => 1,
            "channel_id"    => 1,
            "entity_type"   => "product",
            "entity_id"     => 123,
            "file_name"     => "custom-product-1.html",
        ]);

        $templateAssociationTwo = new CustomTemplateAssociation((object)[
            "id" => 2,
            "channel_id" => 12345,
            "entity_type" => "page",
            "entity_id" => 123,
            "file_name" => "custom-page.html",
        ]);

        $this->getApi()->customTemplateAssociations()->batchUpdate([
            $templateAssociationOne, $templateAssociationTwo
        ]);

        $this->assertTrue(true);
    }
}
