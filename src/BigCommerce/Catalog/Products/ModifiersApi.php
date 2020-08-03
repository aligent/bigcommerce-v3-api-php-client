<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifier;
use BigCommerce\ApiV3\ResponseModels\Product\ModifierResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ModifiersResponse;

class ModifiersApi extends ResourceApi
{
    const RESOURCE_NAME      = 'modifiers';
    const MODIFIERS_ENDPOINT = 'catalog/products/%d/modifiers';
    const MODIFIER_ENDPOINT  = 'catalog/products/%d/modifiers/%d';

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
}
