<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\ProductImageResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;

class ProductImagesApi extends ResourceApi
{
    const RESOURCE_NAME   = 'images';
    const IMAGES_ENDPOINT = 'catalog/products/%d/images';
    const IMAGE_ENDPOINT  = 'catalog/products/%d/images/%d';

    protected function singleResourceEndpoint(): string
    {
        return self::IMAGE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::IMAGES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ProductImageResponse
    {
        return new ProductImageResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        // TODO: Implement getAll() method.
    }
}
