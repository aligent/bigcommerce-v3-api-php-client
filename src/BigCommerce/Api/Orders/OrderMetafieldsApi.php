<?php

namespace BigCommerce\ApiV3\Api\Orders;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Order\OrderMetafield;
use BigCommerce\ApiV3\ResponseModels\Order\OrderMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Order\OrderMetafieldsResponse;

class OrderMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELDS_ENDPOINT = 'orders/%d/metafields';
    private const METAFIELD_ENDPOINT  = 'orders/%d/metafields/%d';

    protected function singleResourceEndpoint(): string
    {
        return self::METAFIELD_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::METAFIELDS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): OrderMetafieldResponse
    {
        return new OrderMetafieldResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): OrderMetafieldsResponse
    {
        return new OrderMetafieldsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(OrderMetafield $orderMetafield): OrderMetafieldResponse
    {
        $orderMetafield->resource_id = $this->getParentResourceId() ?? 0;
        return new OrderMetafieldResponse($this->createResource($orderMetafield));
    }

    public function update(OrderMetafield $orderMetafield): OrderMetafieldResponse
    {
        return new OrderMetafieldResponse($this->updateResource($orderMetafield));
    }
}
