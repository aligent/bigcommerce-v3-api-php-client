<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ChannelCurrencyAssignment extends ResourceModel
{
    public int $channel_id;
    public array $enabled_currencies;
    public string $default_currency;
}
