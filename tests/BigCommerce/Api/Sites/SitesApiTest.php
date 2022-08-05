<?php

namespace BigCommerce\Tests\Api\Sites;

use BigCommerce\ApiV3\ResourceModels\Site\Site;
use BigCommerce\Tests\BigCommerceApiTest;

class SitesApiTest extends BigCommerceApiTest
{
    public function testCanGetSite()
    {
        $this->setReturnData('sites__23__get.json');
        $site = $this->getApi()->site(23)->get()->getSite();
        $this->assertEquals('https://example.com', $site->url);
        $this->assertEquals('https://checkout.example.com', $site->urls[2]->url);
    }

    public function testCanGetSites()
    {
        $this->setReturnData('sites__get_all.json');
        $sites = $this->getApi()->sites()->getAll()->getSites();
        $this->assertEquals(Site::SSL_STATUS_DEDICATED, $sites[0]->ssl_status);
    }
}
