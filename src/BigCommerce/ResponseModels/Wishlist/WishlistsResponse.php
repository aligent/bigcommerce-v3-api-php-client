<?php

namespace BigCommerce\ApiV3\ResponseModels\Wishlist;

use BigCommerce\ApiV3\ResourceModels\Wishlist\Wishlist;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class WishlistsResponse extends PaginatedResponse
{
    /**
     * @return Wishlist[]
     */
    public function getWishlists(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Wishlist::class;
    }
}
