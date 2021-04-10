<?php

namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\ResourceApiNoDelete;
use BigCommerce\ApiV3\ResourceModels\Channel\ChannelListing;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelListingResponse;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelListingsResponse;
use Psr\Http\Message\ResponseInterface;

class ChannelListingsApi extends ResourceApiNoDelete
{
    private const RESOURCE_NAME             = 'listings';
    private const CHANNEL_LISTING_ENDPOINT  = 'channels/%d/listings/%d';
    private const CHANNEL_LISTINGS_ENDPOINT = 'channels/%d/listings';

    protected function singleResourceEndpoint(): string
    {
        return self::CHANNEL_LISTING_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CHANNEL_LISTINGS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ChannelListingResponse
    {
        return new ChannelListingResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ChannelListingsResponse
    {
        return new ChannelListingsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function delete(): ResponseInterface
    {
        throw new \RuntimeException("Unable to delete channel listings");
    }

    public function create(ChannelListing $channelListing): ChannelListingResponse
    {
        return new ChannelListingResponse($this->createResource($channelListing));
    }

    public function update(ChannelListing $channelListing): ChannelListingResponse
    {
        return new ChannelListingResponse($this->updateResource($channelListing));
    }
}
