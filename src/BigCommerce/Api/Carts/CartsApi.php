<?php

namespace BigCommerce\ApiV3\Api\Carts;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResourceModels\Cart\Cart;
use BigCommerce\ApiV3\ResponseModels\Cart\CartResponse;
use GuzzleHttp\RequestOptions;

/**
 * Carts API
 *
 * The is the store management access for creating and viewing carts (not for customers to access carts)
 *
 * Example fetching the contents of a cart:
 *
 * <code>
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $cart = $api->carts('abcdefg;)->get()->getCart();
 * </code>
 * @package BigCommerce\ApiV3\Api\Carts
 */
class CartsApi extends UuidResourceApi
{
    use GetResource;
    use CreateResource;
    use DeleteResource;

    private const CARTS_ENDPOINT = 'carts';
    private const CART_ENDPOINT  = 'carts/%s';

    /**
     *  The Cart returns an abbreviated result. Use this to return physical items product options.
     */
    public const INCLUDE_PHYSICAL_ITEMS = 'line_items.physical_items.options';

    /**
     * The Cart returns an abbreviated result. Use this to return digital items product options.
     */
    public const INCLUDE_DIGITAL_ITEMS = 'line_items.digital_items.options';

    public function get(?string $include = null): CartResponse
    {
        $query = $include ? ['include' => $include] : [];
        return new CartResponse($this->getResource($query));
    }

    public function create(Cart $cart, ?string $include = null): CartResponse
    {
        $query = $include ? ['include' => $include] : [];
        return new CartResponse($this->createResource($cart, $query));
    }

    public function updateCustomerId(int $customerId, ?string $include = null): CartResponse
    {
        $query = $include ? ['include' => $include] : [];
        $response = $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => ['customer_id' => $customerId],
                RequestOptions::QUERY => $query,
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

    public function redirectUrls(): CartRedirectUrlsApi
    {
        $redirectsApi = new CartRedirectUrlsApi($this->getClient());
        $redirectsApi->setParentUuid($this->getUuid());

        return $redirectsApi;
    }
}
