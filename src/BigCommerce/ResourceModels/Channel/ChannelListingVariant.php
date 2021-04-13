<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ChannelListingVariant extends ResourceModel
{
    public int $channel_id;
    public int $product_id;
    public int $variant_id;
    public string $external_id;
    public string $name;
    public string $description;
    public string $state;
    public string $date_created;
    public string $date_modified;
}
