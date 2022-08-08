<?php

namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\Api\Sites\SiteRoutesApi;
use BigCommerce\ApiV3\ResourceModels\Channel\ChannelSite;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelSiteResponse;

class ChannelSitesApi extends V3ApiBase
{
    use GetResource;
    use DeleteResource;
    use CreateResource;
    use UpdateResource;

    private const CHANNEL_SITE_ENDPOINT  = 'channels/%d/site';

    public function get(): ChannelSiteResponse
    {
        return new ChannelSiteResponse($this->getResource());
    }

    public function create(ChannelSite $site): ChannelSiteResponse
    {
        return new ChannelSiteResponse($this->createResource($site));
    }

    public function update(ChannelSite $site): ChannelSiteResponse
    {
        return new ChannelSiteResponse($this->updateResource($site));
    }

    public function multipleResourceUrl(): string
    {
        return $this->singleResourceUrl();
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CHANNEL_SITE_ENDPOINT, $this->getParentResourceId());
    }

    public function routes(): SiteRoutesApi
    {
        return new SiteRoutesApi($this->getClient(), null, $this->getResourceId());
    }

    public function route(int $id): SiteRoutesApi
    {
        return new SiteRoutesApi($this->getClient(), $id, $this->getResourceId());
    }
}
