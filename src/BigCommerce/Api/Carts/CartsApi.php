<?php

namespace BigCommerce\ApiV3\Api\Carts;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResourceModels\Cart\Cart;
use BigCommerce\ApiV3\ResponseModels\Cart\CartResponse;
use GuzzleHttp\RequestOptions;

class CartsApi extends UuidResourceApi
{
    use GetResource;
    use CreateResource;
    use DeleteResource;

    private const CARTS_ENDPOINT = 'carts';
    private const CART_ENDPOINT  = 'carts/%s';

    public function get(): CartResponse
    {
        return new CartResponse($this->getResource());
    }

    public function create(Cart $cart): CartResponse
    {
        return new CartResponse($this->createResource($cart));
    }

    public function updateCustomerId(int $customerId): CartResponse
    {
        $response = $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => ['customer_id' => $customerId],
            ]
        );

        return new CartResponse($response);
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CART_ENDPOINT, $this->getUuid());
    }

    public function multipleResourceUrl(): string
    {
        return self::CARTS_ENDPOINT;
    }

    public function item(string $id): CartItemsApi
    {
        $itemsApi = $this->items();
        $itemsApi->setUuid($id);

        return $itemsApi;
    }

    public function items(): CartItemsApi
    {
        $itemsApi = new CartItemsApi($this->getClient());
        $itemsApi->setParentUuid($this->getUuid());

        return $itemsApi;
    }
}
