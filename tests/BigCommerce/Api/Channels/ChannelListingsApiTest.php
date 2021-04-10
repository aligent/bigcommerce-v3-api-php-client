<?php

namespace BigCommerce\Tests\Api\Channels;

use BigCommerce\ApiV3\ResourceModels\Channel\ChannelListingVariant;
use BigCommerce\Tests\BigCommerceApiTest;

class ChannelListingsApiTest extends BigCommerceApiTest
{
    public function testCanGetListing()
    {
        $this->setReturnData('channel__76953441__listing__41642934.json');

        $listing = $this->getApi()->channel(76953441)->listing(41642934)->get()->getChannelListing();
        $this->assertInstanceOf(ChannelListingVariant::class, $listing->variants[0]);
        $this->assertEquals('consequat sunt in', $listing->name);
        $this->assertEquals('channels/76953441/listings/41642934', $this->getLastRequest()->getUri()->getPath());
    }

    public function testCanGetListings()
    {
        $this->setReturnData('channel__42527118__listings__get.json');
        $id = 42527118;

        $listings = $this->getApi()->channel($id)->listings()->getAll()->getChannelListings();
        $this->assertEquals("channels/$id/listings", $this->getLastRequest()->getUri()->getPath());
        $this->assertEquals('Baseball bat', $listings[0]->name);
    }
}
