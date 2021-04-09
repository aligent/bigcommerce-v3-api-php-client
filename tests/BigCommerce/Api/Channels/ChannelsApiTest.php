<?php
namespace BigCommerce\Tests\Api\Channels;

use BigCommerce\Tests\BigCommerceApiTest;

class ChannelsApiTest extends BigCommerceApiTest
{
    public function testCanGetChannel()
    {
        $this->setReturnData('channels__391563__get.json');
        $id = 391563;

        $channel = $this->getApi()->channel($id)->get()->getChannel();
        $this->assertEquals('Amazon US', $channel->name);
        $this->assertEquals('channels/'.$id, $this->getLastRequest()->getUri()->getPath());
    }

    public function testCanGetChannels()
    {
        $this->setReturnData('channels__get_all.json');

        $channels = $this->getApi()->channels()->getAll()->getChannels();
        $this->assertEquals('bigcommerce', $channels[0]->platform);
        $this->assertEquals('channels', $this->getLastRequest()->getUri()->getPath());
    }
}
