<?php

namespace BigCommerce\Tests\V2;

class V2ApiClientTest extends BigCommerceLegacyApiTest
{
    public function testCanGetCorrectBaseUri()
    {
        $client = $this->getApi();

        $this->assertEquals('https://api.bigcommerce.com/stores/HASH/v2/', $client->getBaseUri());
    }
}
