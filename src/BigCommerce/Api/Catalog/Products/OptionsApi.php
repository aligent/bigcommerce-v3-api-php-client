<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\Api\Catalog\Products\ProductOption\ProductOptionValuesApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOption;
use BigCommerce\ApiV3\ResponseModels\Product\OptionResponse;
use BigCommerce\ApiV3\ResponseModels\OptionsResponse;

class OptionsApi extends ResourceApi
{
    public const OPTIONS_ENDPOINT = 'catalog/products/%d/options';
    public const OPTION_ENDPOINT  = 'catalog/products/%d/options/%d';
    public const RESOURCE_NAME = 'options';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function create(ProductOption $option): OptionResponse
    {
        return new OptionResponse($this->createResource($option));
    }

    public function update(ProductOption $option): OptionResponse
    {
        return new OptionResponse($this->updateResource($option));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): OptionsResponse
    {
        return new OptionsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function get(): OptionResponse
    {
        return new OptionResponse($this->getResource());
    }

    protected function singleResourceEndpoint(): string
    {
        return self::OPTION_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::OPTIONS_ENDPOINT;
    }

    public function values(): ProductOptionValuesApi
    {
        $api = new ProductOptionValuesApi($this->getClient(), null, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }

    public function value(int $valueId): ProductOptionValuesApi
    {
        $api = new ProductOptionValuesApi($this->getClient(), $valueId, $this->getResourceId());
        $api->setProductId($this->getParentResourceId());
        return $api;
    }
}
