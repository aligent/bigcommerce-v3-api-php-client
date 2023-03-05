<?php

namespace BigCommerce\ApiV3\Api\Wishlists;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResourceModels\Wishlist\Wishlist;
use BigCommerce\ApiV3\ResponseModels\Wishlist\WishlistResponse;
use BigCommerce\ApiV3\ResponseModels\Wishlist\WishlistsResponse;

class WishlistsApi extends V3ApiBase
{
    use GetResource;
    use GetAllResources;
    use UpdateResource;
    use CreateResource;
    use DeleteResource;

    public const FILTER_CUSTOMER_ID = 'customer_id';

    private const WISHLIST_ENDPOINT  = 'wishlists/%d';
    private const WISHLISTS_ENDPOINT = 'wishlists';

    public function multipleResourceUrl(): string
    {
        return self::WISHLISTS_ENDPOINT;
    }

    public function singleResourceUrl(): string
    {
        return self::WISHLIST_ENDPOINT;
    }

    public function get(): WishlistResponse
    {
        return new WishlistResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): WishlistsResponse
    {
        return new WishlistsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function update(Wishlist $wishlist): WishlistResponse
    {
        return new WishlistResponse($this->updateResource($wishlist));
    }

    public function create(Wishlist $wishlist): WishlistResponse
    {
        return new WishlistResponse($this->createResource($wishlist));
    }
}
