<?php

namespace BigCommerce\ApiV3\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\Order\OrderMetafield;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class OrderMetafieldResponse extends SingleResourceResponse
{
    private OrderMetafield $metafield;

    public function getMetafield(): OrderMetafield
    {
        return $this->metafield;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->metafield = new OrderMetafield($rawData);
    }
}
