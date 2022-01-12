<?php

namespace BigCommerce\ApiV2;

use BigCommerce\ApiV2\Api\Orders\OrdersApi;
use BigCommerce\ApiV2\Api\StoreInformation\StoreInformationApi;
use BigCommerce\ApiV2\ResourceModels\Order\Order;
use BigCommerce\ApiV3\BaseApiClient;

/**
 * Class for accessing BigCommerce V2 Endpoints
 *
 * Currently only the
 * [Create Order](https://developer.bigcommerce.com/api-reference/store-management/orders/orders/createanorder)
 * endpoint is implement as it has no V3 equivalent.
 *
 * The class is used similarly to the V3 client.
 *
 * ```php
 * $api = new BigCommerce\ApiV2\V2ApiClient($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $order = new BigCommerce\ApiV2\ResourceModels\Order\Order();
 * // set order details...
 *
 * try {
 *     $api->orders->create($order);
 * } catch (\Psr\Http\Client\ClientExceptionInterface $exception) {
 *     echo "Unable to update product: {$exception->getMessage()}";
 * }
 * ```
 */
class V2ApiClient extends BaseApiClient
{
    private const API_URL = 'https://api.bigcommerce.com/stores/%s/v2/';

    protected function defaultBaseUrl(): string
    {
        return self::API_URL;
    }

    public function orders(): OrdersApi
    {
        return new OrdersApi($this);
    }

    public function order(int $orderId): OrdersApi
    {
        return new OrdersApi($this, $orderId);
    }

    public function storeInformation(): StoreInformationApi
    {
        return new StoreInformationApi($this);
    }
}
