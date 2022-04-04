<?php

namespace BigCommerce\ApiV2\Api\Orders;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
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
}
