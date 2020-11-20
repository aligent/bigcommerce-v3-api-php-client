<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Subscriber extends ResourceModel
{
    public const SOURCE_STOREFRONT  = 'storefront';
    public const SOURCE_ORDER       = 'order';
    public const SOURCE_CUSTOM      = 'custom';

    public string $email;
    public string $first_name;
    public string $last_name;
    public string $source;
    public int $order_id;
    public int $channel_id;
    public int $id;
    public string $date_modified;
    public string $date_created;
}
