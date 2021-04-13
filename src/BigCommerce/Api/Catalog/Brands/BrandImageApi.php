<?php

namespace BigCommerce\ApiV3\Api\Catalog\Brands;

use BigCommerce\ApiV3\Api\Generic\ResourceImageApi;

/**
 * Brand Images API
 *
 * Usage (creating a brand image for Brand with ID of 1):
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $api->catalog()->brand(1)->image()->create('/path/to/image.png');
 * ```
 *
 * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/brand-images/createbrandimage
 * @see \BigCommerce\ApiV3\Api\Generic\CreateImage::create()
 *
 */
class BrandImageApi extends ResourceImageApi
{
    private const BRAND_IMAGE_ENDPOINT = 'catalog/brands/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::BRAND_IMAGE_ENDPOINT;
    }
}
