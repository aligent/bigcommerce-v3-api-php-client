<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Catalog\Products\ProductModifier\ProductModifierImagesApi;
use BigCommerce\ApiV3\Api\Catalog\Products\ProductModifier\ProductModifierValuesApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifier;
use BigCommerce\ApiV3\ResponseModels\Product\ModifierResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ModifiersResponse;

class ModifiersApi extends ResourceApi
{
    public const RESOURCE_NAME      = 'modifiers';
    public const MODIFIERS_ENDPOINT = 'catalog/products/%d/modifiers';
    public const MODIFIER_ENDPOINT  = 'catalog/products/%d/modifiers/%d';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function create(ProductModifier $modifier): ModifierResponse
    {
        return new ModifierResponse($this->createResource($modifier));
    }

    public function update(ProductModifier $modifier): ModifierResponse
    {
        return new ModifierResponse($this->updateResource($modifier));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ModifiersResponse
    {
        return new ModifiersResponse($this->getAllResources($filters, $page, $limit));
    }

    public function get(): ModifierResponse
    {
        return new ModifierResponse($this->getResource());
    }

    protected function singleResourceEndpoint(): string
    {
        return self::MODIFIER_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::MODIFIERS_ENDPOINT;
    }

    public function values(): ProductModifierValuesApi
    {
        $api = new ProductModifierValuesApi($this->getClient(), null, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }

    public function value(int $valueId): ProductModifierValuesApi
    {
        $api = new ProductModifierValuesApi($this->getClient(), $valueId, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }

    public function image(int $imageId): ProductModifierImagesApi
    {
        $api = new ProductModifierImagesApi($this->getClient(), $imageId, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }
}
