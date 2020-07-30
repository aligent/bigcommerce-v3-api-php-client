<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductImage;
use BigCommerce\ApiV3\ResponseModels\ProductImageResponse;
use BigCommerce\ApiV3\ResponseModels\ProductImagesResponse;

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

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductImagesResponse
    {
        return new ProductImagesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(ProductImage $productImage): ProductImageResponse
    {
        return new ProductImageResponse($this->createResource($productImage));
    }
}
