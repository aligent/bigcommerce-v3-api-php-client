<?php

namespace BigCommerce\ApiV3\Orders;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Order\OrderMetafieldResponse;
use BigCommerce\ApiV3\ResponseModels\Order\OrderMetafieldsResponse;

class OrderMetafieldsApi extends ResourceApi
{
    private const RESOURCE_NAME       = 'metafields';
    private const METAFIELD_ENDPOINT  = 'orders/{order_id}/metafields';
    private const METAFIELDS_ENDPOINT = 'orders/{order_id}/metafields/%d';

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
}
