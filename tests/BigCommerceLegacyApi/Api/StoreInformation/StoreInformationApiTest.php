<?php

namespace BigCommerce\Tests\V2\Api\StoreInformation;

use BigCommerce\Tests\V2\V2ApiClientTest;

class StoreInformationApiTest extends V2ApiClientTest
{
    public function testCanGetTime(): void
    {
        $this->setReturnData('storeinformation_time.json');

        $this->assertEquals(1529512970, $this->getApi()->storeInformation()->time());
    }

    public function testCanGetStoreInformation(): void
    {
        $this->setReturnData('storeinformation_store.json');

        $information = $this->getApi()->storeInformation()->storeInformation();

        $this->assertEquals('BigCommerce', $information->name);
        $this->assertEquals('my-awesome.store', $information->domain);
    }
}
