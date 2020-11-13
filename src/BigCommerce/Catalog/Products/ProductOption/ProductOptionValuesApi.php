<?php

namespace BigCommerce\ApiV3\Catalog\Products\ProductOption;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Product\ProductOptionValueResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductOptionValuesResponse;

class ProductOptionValuesApi extends ResourceApi
{
    private int $productId;

    public const RESOURCE_NAME   = 'values';
    public const VALUES_ENDPOINT = 'catalog/products/%d/options/%d/values';
    public const VALUE_ENDPOINT  = 'catalog/products/%d/options/%d/values/%d';

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::VALUE_ENDPOINT;
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
        return self::VALUES_ENDPOINT;
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

    public function get(): ProductOptionValueResponse
    {
        return new ProductOptionValueResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductOptionValuesResponse
    {
        return new ProductOptionValuesResponse($this->getAllResources($filters, $page, $limit));
    }
}
