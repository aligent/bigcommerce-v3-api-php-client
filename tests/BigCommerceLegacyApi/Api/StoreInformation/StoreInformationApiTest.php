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

        $information = $this->getApi()->storeInformation()->get();

        $this->assertEquals('BigCommerce', $information->name);
        $this->assertEquals('my-awesome.store', $information->domain);
        $this->assertEquals(
            'https://cdn8.bigcommerce.com/s-{store_hash}/product_images/'
            . 'screen_shot_2018-05-15_at_12.22.26_pm__05547_1529512135.png',
            $information->logo->url
        );
    }

    public function testCanGetStoreInformationForStoreWithNoLogo()
    {
        //Weird API design means the logo is set to empty array if no logo present
        $this->setReturnData('storeinformation_store__no-logo.json');

        $information = $this->getApi()->storeInformation()->get();

        $this->assertEquals('MLITest', $information->name);
        $this->assertNull($information->logo);
    }
}
