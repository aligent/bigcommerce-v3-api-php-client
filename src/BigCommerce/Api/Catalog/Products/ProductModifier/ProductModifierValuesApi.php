<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products\ProductModifier;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierValue;
use BigCommerce\ApiV3\ResponseModels\Product\ProductModifierValueResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductModifierValuesResponse;

class ProductModifierValuesApi extends ResourceApi
{
    private int $productId;

    public const RESOURCE_NAME   = 'values';
    public const VALUES_ENDPOINT = 'catalog/products/%d/modifiers/%d/values';
    public const VALUE_ENDPOINT  = 'catalog/products/%d/modifiers/%d/values/%d';

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

    public function get(): ProductModifierValueResponse
    {
        return new ProductModifierValueResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductModifierValuesResponse
    {
        return new ProductModifierValuesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function update(ProductModifierValue $modifierValue): ProductModifierValueResponse
    {
        return new ProductModifierValueResponse($this->updateResource($modifierValue));
    }

    public function create(ProductModifierValue $modifierValue): ProductModifierValueResponse
    {
        return new ProductModifierValueResponse($this->createResource($modifierValue));
    }
}
