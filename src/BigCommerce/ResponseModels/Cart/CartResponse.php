<?php

namespace BigCommerce\ApiV3\ResponseModels\Cart;

use BigCommerce\ApiV3\ResourceModels\Cart\Cart;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CartResponse extends SingleResourceResponse
{
    private Cart $cart;

    public function getCart(): Cart
    {
        return $this->cart;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->cart = new Cart($rawData);
    }
}
