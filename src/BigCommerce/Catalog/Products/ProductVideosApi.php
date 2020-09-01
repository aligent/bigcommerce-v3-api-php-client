<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVideoResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVideosResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

class ProductVideosApi extends ResourceApi
{
    public const RESOURCE_NAME   = 'videos';
    public const VIDEO_ENDPOINT  = 'catalog/products/%s/videos';
    public const VIDEOS_ENDPOINT = 'catalog/products/%s/videos/%s';

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
