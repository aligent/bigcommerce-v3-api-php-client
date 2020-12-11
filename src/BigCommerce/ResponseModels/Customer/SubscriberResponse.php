<?php

namespace BigCommerce\ApiV3\ResponseModels\Customer;

use BigCommerce\ApiV3\ResourceModels\Customer\Subscriber;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class SubscriberResponse extends SingleResourceResponse
{
    private Subscriber $subscriber;

    public function getSubscriber(): Subscriber
    {
        return $this->subscriber;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->subscriber = new Subscriber($rawData);
    }
}
