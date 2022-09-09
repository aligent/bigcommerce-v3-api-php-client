<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ChannelAssignment extends ResourceModel
{
	public int $channel_id;
	public int $product_id;
}
