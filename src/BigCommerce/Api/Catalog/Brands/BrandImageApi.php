<?php

namespace BigCommerce\ApiV3\Api\Catalog\Brands;

use BigCommerce\ApiV3\Api\Generic\ResourceImageApi;

class BrandImageApi extends ResourceImageApi
{
    private const BRAND_IMAGE_ENDPOINT = 'catalog/brands/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::BRAND_IMAGE_ENDPOINT;
    }
}
