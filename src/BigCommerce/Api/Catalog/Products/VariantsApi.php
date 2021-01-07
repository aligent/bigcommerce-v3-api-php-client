<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Catalog\Products\ProductVariant\ProductVariantMetafieldsApi;
use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVariantResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVariantsResponse;

class VariantsApi extends ResourceApi
{
    public const RESOURCE_NAME     = 'variants';
    public const VARIANTS_ENDPOINT = 'catalog/products/%d/variants';
    public const VARIANT_ENDPOINT  = 'catalog/products/%d/variants/%d';

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

    public function create(ProductVariant $productVariant): ProductVariantResponse
    {
        return new ProductVariantResponse($this->createResource($productVariant));
    }

    public function update(ProductVariant $productVariant): ProductVariantResponse
    {
        return new ProductVariantResponse($this->updateResource($productVariant));
    }

    public function metafield(int $metafieldId = null): ProductVariantMetafieldsApi
    {
        $api = new ProductVariantMetafieldsApi($this->getClient(), $metafieldId, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }

    public function metafields(): ProductVariantMetafieldsApi
    {
        return $this->metafield();
    }
}
