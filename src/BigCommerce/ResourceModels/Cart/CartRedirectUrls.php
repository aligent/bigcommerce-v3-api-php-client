<?php

namespace BigCommerce\ApiV3\ResourceModels\Cart;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CartRedirectUrls extends ResourceModel
{
    public string $cart_url;
    public string $checkout_url;
    public string $embedded_checkout_url;
}
