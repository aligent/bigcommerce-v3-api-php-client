<?php

namespace BigCommerce\Tests\Api\Channels;

use BigCommerce\Tests\BigCommerceApiTest;

class ChannelSitesApiTest extends BigCommerceApiTest
{
    public function testCanGetSite()
    {
        $this->setReturnData('channels__18735__site__1__get.json');
        $channelId = 18735;

        $site = $this->getApi()->channel($channelId)->site()->get()->getSite();
        $this->assertEquals('https://www.my-awesome-site.com', $site->url);
        $this->assertEquals("channels/$channelId/site", $this->getLastRequest()->getUri()->getPath());
    }
}
