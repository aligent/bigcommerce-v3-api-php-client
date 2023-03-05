<?php

namespace BigCommerce\ApiV3\ResponseModels\Wishlist;

use BigCommerce\ApiV3\ResourceModels\Wishlist\Wishlist;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class WishlistResponse extends SingleResourceResponse
{
    private Wishlist $wishlist;

    public function getWishlist(): Wishlist
    {
        return $this->wishlist;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->wishlist = new Wishlist($rawData);
    }
}
