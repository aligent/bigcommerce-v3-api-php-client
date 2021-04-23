<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products\ProductVariant;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariantMetafield;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVariantMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductVariantMetafieldsResponse;

class ProductVariantMetafieldsApi extends ResourceApi
{
    private int $productId;

    private const RESOURCE_NAME = 'metafields';
    private const METAFIELD_ENDPOINT = 'catalog/product/%d/variants/%d/metafields/%d';
    private const METAFIELDS_ENDPOINT = 'catalog/product/%d/variants/%d/metafields';

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::METAFIELD_ENDPOINT;
    }

    protected function singleResourceUrl(): string
    {
        return sprintf(
            $this->singleResourceEndpoint(),
            $this->getProductId(),
            $this->getParentResourceId() ?? $this->getResourceId(),
            $this->getResourceId()
        );
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::METAFIELDS_ENDPOINT;
    }

    protected function multipleResourceUrl(): string
    {
        return sprintf(
            $this->multipleResourcesEndpoint(),
            $this->getProductId(),
            $this->getParentResourceId()
        );
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ProductVariantMetafieldResponse
    {
        return new ProductVariantMetafieldResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductVariantMetafieldsResponse
    {
        return new ProductVariantMetafieldsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(ProductVariantMetafield $metafield): ProductVariantMetafieldResponse
    {
        $metafield->resource_id = $this->getParentResourceId() ?? 0;
        return new ProductVariantMetafieldResponse($this->createResource($metafield));
    }

    public function update(ProductVariantMetafield $metafield): ProductVariantMetafieldResponse
    {
        return new ProductVariantMetafieldResponse($this->updateResource($metafield));
    }
}
