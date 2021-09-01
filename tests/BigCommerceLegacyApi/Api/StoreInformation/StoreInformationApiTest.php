<?php
namespace BigCommerce\Tests\V2\Api\StoreInformation;

use BigCommerce\Tests\V2\V2ApiClientTest;

class StoreInformationApiTest extends V2ApiClientTest
{
    public function testCanGetTime():void
    {
        $this->setReturnData('storeinformation_time.json');

        $this->assertEquals(1529512970, $this->getApi()->storeInformation()->time());
    }
}
