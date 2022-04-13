<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResponseModels\Order\ShippingAddress;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;

class OrderShippingAddressesApi extends V2ApiBase
{
    use GetResource;
    use GetAllResources;

    private const SHIPPING_ADDRESSES_ENDPOINT = 'orders/%d/shipping_addresses';
    private const SHIPPING_ADDRESS_ENDPOINT   = 'orders/%d/shipping_addresses/%d';

    public function multipleResourceUrl(): string
    {
        return sprintf(self::SHIPPING_ADDRESSES_ENDPOINT, $this->getParentResourceId());
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::SHIPPING_ADDRESS_ENDPOINT, $this->getParentResourceId(), $this->getResourceId());
    }

    public function get(): ShippingAddress
    {
        $response = $this->getResource();

        return new ShippingAddress(json_decode($response->getBody()));
    }

    /**
     * @param int $page
     * @param int $limit
     * @return ShippingAddress[]
     */
    public function getAll(int $page = 1, int $limit = 250): array
    {
        $response = $this->getAllResources([], $page, $limit);

        return array_map(fn($a) => new ShippingAddress($a), json_decode($response->getBody()));
    }
}
