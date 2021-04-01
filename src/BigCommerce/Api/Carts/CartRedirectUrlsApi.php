<?php


namespace BigCommerce\ApiV3\Api\Carts;


use BigCommerce\ApiV3\Api\Generic\UuidResourceWithUuidParentApi;
use BigCommerce\ApiV3\ResponseModels\Cart\CartRedirectUrlsResponse;

class CartRedirectUrlsApi extends UuidResourceWithUuidParentApi
{
    private const REDIRECT_URL = 'carts/%d/redirect_urls';

    public function create(): CartRedirectUrlsResponse
    {
        $response = $this->getClient()->getRestClient()->put(
            sprintf(self::REDIRECT_URL, $this->getParentUuid())
        );

        return new CartRedirectUrlsResponse($response);
    }
}
