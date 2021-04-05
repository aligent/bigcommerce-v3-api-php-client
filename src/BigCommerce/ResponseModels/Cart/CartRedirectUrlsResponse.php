<?php

namespace BigCommerce\ApiV3\ResponseModels\Cart;

use BigCommerce\ApiV3\ResourceModels\Cart\CartRedirectUrls;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class CartRedirectUrlsResponse extends SingleResourceResponse
{
    private CartRedirectUrls $cartRedirectUrls;

    public function getCartRedirectUrls(): CartRedirectUrls
    {
        return $this->cartRedirectUrls;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->cartRedirectUrls = new CartRedirectUrls($rawData);
    }
}
