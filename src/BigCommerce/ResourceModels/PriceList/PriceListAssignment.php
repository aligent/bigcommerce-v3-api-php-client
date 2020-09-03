<?php

namespace BigCommerce\ApiV3\ResourceModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PriceListAssignment extends ResourceModel
{
    public int $id;
    public int $customer_group_id;
    public int $price_list_id;
    public ?int $channel_id;
}
