<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV2\ResponseModels\Order\OrderCount;
use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV2\ResponseModels\Order\Order as OrderResponse;

/**
 * Orders v2 API
 *
 * Some functionality for Orders is not available in V3, so this V2 API class has been implemented.
 *
 * @see \BigCommerce\ApiV3\Api\Orders\OrdersApi for the V3 API
 * @see OrderProductsApi for listing the products in an order
 *
 * ### Example
 *
 * #### Create an Order
 * ```php
 * $api = new BigCommerce\ApiV2\V2ApiClient($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $order = new BigCommerce\ApiV2\ResourceModels\Order\Order();
 * $order->products = [
 *     OrderProduct::build('test', 1, 12, 10),
 * ];
 * // set order details...
 *
 * try {
 *     $createdOrder = $api->orders->create($order);
 *     echo "Order {$createdOrder->id} has been created.";
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to update product: {$exception->getMessage()}";
 * }
 * ```
 *
 * #### Get Order Counts
 *
 * ```php
 * $api = new BigCommerce\ApiV2\V2ApiClient($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 * $ordersAwaitingFulfillmentCount = $api->orders()->count()->statuses['Awaiting Fulfillment'];
 * ```
 */
class OrdersApi extends V2ApiBase
{
    use CreateResource;
    use GetResource;
    use GetAllResources;

    private const ORDERS_ENDPOINT = 'orders';
    private const ORDER_ENDPOINT  = 'orders/%d';
    private const ORDER_COUNT_ENDPOINT = 'orders/count';

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

        if ($response->getStatusCode() === 204) {
            return [];
        }

        return array_map(fn($r) => new OrderResponse($r), json_decode($response->getBody()));
    }

    public function count(): OrderCount
    {
        $response = $this->getClient()->getRestClient()->get(
            self::ORDER_COUNT_ENDPOINT
        );

        return new OrderCount(json_decode($response->getBody()));
    }

    public function products(): OrderProductsApi
    {
        return new OrderProductsApi($this->getClient(), null, $this->getResourceId());
    }

    public function product(int $orderProductId): OrderProductsApi
    {
        return new OrderProductsApi($this->getClient(), $orderProductId, $this->getResourceId());
    }

    public function shippingAddresses(): OrderShippingAddressesApi
    {
        return new OrderShippingAddressesApi($this->getClient(), null, $this->getResourceId());
    }

    public function shippingAddress(int $id): OrderShippingAddressesApi
    {
        return new OrderShippingAddressesApi($this->getClient(), $id, $this->getResourceId());
    }
}
