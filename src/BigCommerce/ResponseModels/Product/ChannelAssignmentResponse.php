<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ChannelAssignments;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ChannelAssignmentResponse extends SingleResourceResponse
{
	private ChannelAssignment $channelAssignment;

	public function getChannelAssignment(): ChannelAssignment
	{
		return $this->channelAssignment;
	}

	protected function addData(stdClass $rawData): void
	{
		$this->channelAssignment = new ChannelAssignment($rawData);
	}
}
