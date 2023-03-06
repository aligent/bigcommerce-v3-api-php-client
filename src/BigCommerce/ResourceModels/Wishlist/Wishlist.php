<?php

namespace BigCommerce\ApiV3\ResourceModels\Wishlist;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Wishlist extends ResourceModel
{
    /**
     * Wishlist ID, provided after creating a wishlist with a POST.
     */
    public int $id;

    /**
     * The ID the customer to which the wishlist belongs.
     */
    public int $customer_id;

    /**
     * The name of the wishlist.
     */
    public string $name;

    /**
     * Whether the wishlist is available to the public.
     */
    public bool $is_public;

    /**
     * The token of the wishlist. This is created internally within BigCommerce.
     * The wishlist ID is to be used for external apps. Read-Only.
     */
    public string $token;

    /**
     * @var WishlistItem[] Array of wishlist items.
     */
    public array $items;

    protected function beforeBuildObject(): void
    {
        $this->buildObjectArray('items', WishlistItem::class);
        parent::beforeBuildObject();
    }
}
