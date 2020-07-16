<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\ProductVariantResponse;
use BigCommerce\ApiV3\ResponseModels\ProductVariantsResponse;

class VariantsApi extends ResourceApi
{
    const RESOURCE_NAME     = 'variants';
    const VARIANTS_ENDPOINT = 'catalog/products/%d/variants';
    const VARIANT_ENDPOINT  = 'catalog/products/%d/variants/%d';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::VARIANT_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::VARIANTS_ENDPOINT;
    }

    public function get(): ProductVariantResponse
    {
        return new ProductVariantResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductVariantsResponse
    {
        return new ProductVariantsResponse($this->getAllResources($filters, $page, $limit));
    }
}
