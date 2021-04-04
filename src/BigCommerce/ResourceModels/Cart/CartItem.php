<?php

namespace BigCommerce\ApiV3\ResourceModels\Cart;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CartItem extends ResourceModel
{
    public array $line_items;
    public array $gift_certificates;
    public array $custom_items;
}
