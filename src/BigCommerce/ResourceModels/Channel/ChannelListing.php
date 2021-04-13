<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class ChannelListing extends ResourceModel
{
    public int $channel_id;
    public int $product_id;
    public int $listing_id;
    public string $external_id;
    public string $name;
    public string $description;
    public string $state;
    public string $date_created;
    public string $date_modified;

    /**
     * @var ChannelListingVariant[]
     */
    public array $variants;

    public function __construct(?stdClass $optionObject = null)
    {
        foreach ($optionObject->variants as $variant) {
            $this->variants[] = new ChannelListingVariant($variant);
        }

        unset($optionObject->variants);
        parent::__construct($optionObject);
    }
}
