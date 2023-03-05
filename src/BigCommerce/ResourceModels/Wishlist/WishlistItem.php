<?php

namespace BigCommerce\ApiV3\ResourceModels\Wishlist;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class WishlistItem extends ResourceModel
{
    public int $id;
    public int $product_id;
    public ?int $variant_id;
}
