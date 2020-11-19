<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVideoResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVideosResponse;

class ProductVideosApi extends ResourceApi
{
    public const RESOURCE_NAME   = 'videos';
    public const VIDEO_ENDPOINT  = 'catalog/products/%d/videos/%s';
    public const VIDEOS_ENDPOINT = 'catalog/products/%d/videos';

    protected function singleResourceEndpoint(): string
    {
        return self::VIDEO_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::VIDEOS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ProductVideoResponse
    {
        return new ProductVideoResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductVideosResponse
    {
        return new ProductVideosResponse($this->getAllResources($filters, $page, $limit));
    }
}
