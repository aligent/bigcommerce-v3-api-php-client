<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResponseModels\Order\OrderProduct;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;

class OrderProductsApi extends V2ApiBase
{
    use GetResource;
    use GetAllResources;

    private const ORDER_PRODUCTS_ENDPOINT = 'orders/%d/products';
    private const ORDER_PRODUCT_ENDPOINT = 'orders/%d/products/%d';

    public function multipleResourceUrl(): string
    {
        return sprintf(self::ORDER_PRODUCTS_ENDPOINT, $this->getParentResourceId());
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::ORDER_PRODUCT_ENDPOINT, $this->getParentResourceId(), $this->getResourceId());
    }

    public function get(): OrderProduct
    {
        $response = $this->getResource();

        return new OrderProduct(json_decode($response->getBody()));
    }

    /**
     * @return OrderProduct[]
     */
    public function getAll(int $page = 1, int $limit = 250): array
    {
        $response = $this->getAllResources([], $page, $limit);

        return array_map(fn($p) => new OrderProduct($p), json_decode($response->getBody()));
    }
}
