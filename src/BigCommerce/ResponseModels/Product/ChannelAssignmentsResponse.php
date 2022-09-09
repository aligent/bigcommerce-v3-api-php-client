<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ChannelAssignment;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;

class ChannelAssignmentsResponse extends PaginatedBatchableResponse
{
	/**
	 * @return ChannelAssignment[]
	 */
	public function getChannelAssignments(): array
	{
		return $this->getData();
	}

	protected function resourceClass(): string
	{
		return ChannelAssignment::class;
	}
}
