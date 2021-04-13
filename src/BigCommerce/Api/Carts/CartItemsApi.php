<?php

namespace BigCommerce\ApiV3\Api\Carts;

use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceWithUuidParentApi;
use BigCommerce\ApiV3\ResourceModels\Cart\CartItem;
use BigCommerce\ApiV3\ResponseModels\Cart\CartResponse;
use GuzzleHttp\RequestOptions;

/**
 * Cart Items API
 *
 *
 * Example for adding a line item to a cart:
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $lineItem = new CartItem();
 * $lineItem->line_items[] = [
 *     "sku"        => "made-up",
 *     "name"       => "My product",
 *     "quantity"   => 33,
 *     "list_price" => 55
 * ];
 *
 * $api()->cart($id)->items()->add($lineItem, CartItemsApi::INCLUDE_REDIRECT_URLS);
 * ```
 *
 */
class CartItemsApi extends UuidResourceWithUuidParentApi
{
    use DeleteResource;

    private const CARTS_ENDPOINT = 'carts/%s/items';
    private const CART_ENDPOINT  = 'carts/%s/items/%s';

    /**
     * Create a direct link to a Cart.
     */
    public const INCLUDE_REDIRECT_URLS = 'redirect_urls';

    /**
     *  The Cart returns an abbreviated result. Use this to return physical items product options.
     */
    public const INCLUDE_PHYSICAL_ITEMS = 'line_items.physical_items.options';

    /**
     * The Cart returns an abbreviated result. Use this to return digital items product options.
     */
    public const INCLUDE_DIGITAL_ITEMS = 'line_items.digital_items.options';

    public function add(CartItem $cartItem, ?string $include = null): CartResponse
    {
        $query = $include ? ['include' => $include] : [];
        $response = $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $cartItem,
                RequestOptions::QUERY => $query,
            ]
        );

        return new CartResponse($response);
    }

    public function update(CartItem $cartItem, ?string $include = null): CartResponse
    {
        $query = $include ? ['include' => $include] : [];
        $response = $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => $cartItem,
                RequestOptions::QUERY => $query,
            ]
        );

        return new CartResponse($response);
    }

    public function multipleResourceUrl(): string
    {
        return sprintf(self::CARTS_ENDPOINT, $this->getParentUuid());
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CART_ENDPOINT, $this->getParentUuid(), $this->getUuid());
    }
}
