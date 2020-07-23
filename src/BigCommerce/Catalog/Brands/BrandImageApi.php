<?php
namespace BigCommerce\ApiV3\Catalog\Brands;

use BigCommerce\ApiV3\Api\ResourceImageApi;

class BrandImageApi extends ResourceImageApi
{
    private const BRAND_IMAGE_ENDPOINT = 'catalog/brands/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::BRAND_IMAGE_ENDPOINT;
    }
}
