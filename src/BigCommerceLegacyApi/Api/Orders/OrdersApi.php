<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV2\ResponseModels\Order\Order as OrderResponse;

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
    use GetResource;
    use GetAllResources;

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

    public function get(): ?OrderResponse
    {
        $response = $this->getResource();

        return new OrderResponse(json_decode($response->getBody()));
    }

    /**
     * @return OrderResponse[]
     */
    public function getAll(array $filters = [], int $page = 1, int $limit = 250): array
    {
        $response = $this->getAllResources($filters, $page, $limit);

        return array_map(fn($r) => new OrderResponse($r), json_decode($response->getBody()));
    }
}
