<?php

namespace BigCommerce\ApiV3\Api\Carts;

use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResponseModels\Cart\CartResponse;

class CartsApi extends UuidResourceApi
{
    use GetResource;
    use DeleteResource;

    private const CARTS_ENDPOINT = 'carts';
    private const CART_ENDPOINT  = 'carts/%s';

    public function get(): CartResponse
    {
        return new CartResponse($this->getResource());
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CART_ENDPOINT, $this->getUuid());
    }
}
