<?php


namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ChannelAssignment;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ChannelAssignments;
use BigCommerce\ApiV3\ResponseModels\Product\ChannelAssignmentsResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ChannelAssignmentResponse;

class ChannelAssignmentsApi extends ResourceApi {
	public const RESOURCE_NAME = 'channelassignment';
	public const CHANNELASSIGNMENTS_ENDPOINT = 'catalog/products/channel-assignments';

	protected function singleResourceEndpoint(): string {
		return self::CHANNELASSIGNMENTS_ENDPOINT;
	}

	protected function multipleResourcesEndpoint(): string {
		return self::CHANNELASSIGNMENTS_ENDPOINT;
	}

	protected function resourceName(): string {
		return self::RESOURCE_NAME;
	}
	public function get(): ChannelAssignmentResponse {
		return new ChannelAssignmentResponse( $this->getResource() );
	}
	public function getAll( array $filters = [], int $page = 1, int $limit = 250 ): ChannelAssignmentsResponse {
		return new ChannelAssignmentsResponse( $this->getAllResources( $filters, $page, $limit ) );
	}

}
