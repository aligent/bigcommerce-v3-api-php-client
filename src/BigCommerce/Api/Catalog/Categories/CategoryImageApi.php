<?php

namespace BigCommerce\ApiV3\Api\Catalog\Categories;

use BigCommerce\ApiV3\Api\Generic\ResourceImageApi;

/**
 * Category Images API
 *
 * Usage (creating an image for Category with ID of 1):
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $api->catalog()->category(1)->image()->create('/path/to/image.png');
 * ```
 *
 * @see https://developer.bigcommerce.com/api-reference/store-management/catalog/brand-images/createbrandimage
 * @see \BigCommerce\ApiV3\Api\Generic\CreateImage::create()
 *
 */
class CategoryImageApi extends ResourceImageApi
{
    public const CATEGORY_IMAGE_ENDPOINT = 'catalog/categories/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::CATEGORY_IMAGE_ENDPOINT;
    }
}
