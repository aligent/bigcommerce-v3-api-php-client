<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderStatusCount extends ResourceModel
{
    public int $id;
    public string $name;
    public string $system_label;
    public string $custom_label;
    public string $system_description;
    public int $count;
    public int $sort_order;
}
