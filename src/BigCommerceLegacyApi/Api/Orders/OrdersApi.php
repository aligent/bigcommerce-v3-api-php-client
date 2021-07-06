<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV3\Api\Generic\CreateResource;

/**
 * Orders v2 API
 *
 * Currently only implements _create_.
 *
 * ### Example
 *
 * ```php
 * $api = new BigCommerce\ApiV2\V2ApiClient($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $order = new BigCommerce\ApiV2\ResourceModels\Order\Order();
 * // set order details...
 *
 * try {
 *     $createdOrder = $api->orders->create($order);
 *     echo "Order {$createdOrder->id} has been created.";
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to update product: {$exception->getMessage()}";
 * }
 * ```
 */
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

    public function create(Order $order): object
    {
        $response = $this->createResource($order);

        return json_decode($response->getBody());
    }
}
