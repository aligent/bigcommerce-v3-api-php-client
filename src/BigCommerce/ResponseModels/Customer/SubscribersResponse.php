<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\Subscriber;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class SubscribersResponse extends PaginatedResponse
{
    /**
     * @return Subscriber[]
     */
    public function getSubscribers(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Subscriber::class;
    }
}
