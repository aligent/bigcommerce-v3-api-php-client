<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class OrderCount extends ResourceModel
{
    /**
     * @var OrderStatusCount[] with name as the key
     */
    public array $statuses;
    public int $count;

    public function __construct(?stdClass $optionObject = null)
    {
        $this->statuses = [];
        foreach ($optionObject->statuses as $status) {
            $statusCount = new OrderStatusCount($status);
            $this->statuses[$statusCount->name] = $statusCount;
        }
        unset($optionObject->statuses);

        parent::__construct($optionObject);
    }
}
