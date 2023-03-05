<?php

namespace BigCommerce\Tests\Api\Wishlists;

use BigCommerce\Tests\BigCommerceApiTest;

class WishlistsApiTest extends BigCommerceApiTest
{
    public function testCanGetWishlist()
    {
        $this->setReturnData('wishlist__30__get.json');
        $wishlist = $this->getApi()->wishlist(30)->get()->getWishlist();

        $this->assertEquals('Christmas List', $wishlist->name);
        $this->assertEquals(80, $wishlist->items[1]->product_id);
    }

    public function testCanGetWishlists()
    {
        $this->setReturnData('wishlist__get_all.json');

        $wishlists = $this->getApi()->wishlists()->getAll()->getWishlists();
        $this->assertEquals(20, $wishlists[2]->customer_id);
    }
}
