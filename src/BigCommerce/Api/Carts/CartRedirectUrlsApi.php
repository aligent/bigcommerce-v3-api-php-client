<?php

namespace BigCommerce\ApiV3\Api\Carts;

use BigCommerce\ApiV3\Api\Generic\UuidResourceWithUuidParentApi;
use BigCommerce\ApiV3\ResponseModels\Cart\CartRedirectUrlsResponse;

/**
 * Cart Redirect URLS
 *
 * Creates a Cart redirect URL for redirecting a shopper to an already created cart using the cartId.
 *
 * #### Usage Notes
 *
 *  - Redirect URLs can also be created via Create a Cart requests by appending include=redirect_urls.
 *  - A Carts redirect URLs may only be used once.
 *  - Once a redirect URL has been visited, it will be invalidated and cannot be used again.
 *  - If your application requires URLs to be visited more than once, consider generating a fresh one each time you need
 *    to restore a cart, and redirecting to the URL from your own application.
 *  - Redirect URLs can be generated only from carts created using the Server to Server Cart API.
 *  - To restore a cart that was created on the storefront, either by a shopper or the Storefront Cart API, first
 *    recreate the cart using the Server to Server Cart API.
 *
 * Example:
 *
 * <code>
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $urls = $api->cart('sadfghj')->redirectUrls()->getRedirectUrls();
 * </code>
 */
class CartRedirectUrlsApi extends UuidResourceWithUuidParentApi
{
    private const REDIRECT_URL = 'carts/%s/redirect_urls';

    public function create(): CartRedirectUrlsResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            sprintf(self::REDIRECT_URL, $this->getParentUuid())
        );

        return new CartRedirectUrlsResponse($response);
    }
}
