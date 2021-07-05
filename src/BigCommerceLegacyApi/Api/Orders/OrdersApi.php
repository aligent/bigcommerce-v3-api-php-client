<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV3\Api\Generic\CreateResource;

class OrdersApi extends V2ApiBase
{
    use CreateResource;

    private const ORDERS_ENDPOINT = 'orders';
    private const ORDER_ENDPOINT  = 'orders/%d';

    public function singleResourceUrl(): string
    {
        return sprintf(self::ORDER_ENDPOINT, $this->getResourceId());
    }

    public function multipleResourceUrl(): string
    {
        return self::ORDERS_ENDPOINT;
    }

    public function create(Order $order): bool
    {
        $response = $this->createResource($order);

        return in_array($response->getStatusCode(), [200, 201, 204]);
    }
}
