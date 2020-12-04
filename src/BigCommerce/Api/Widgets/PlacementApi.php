<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\UuidCompleteResourceApi;
use BigCommerce\ApiV3\ResourceModels\Widget\Placement;
use BigCommerce\ApiV3\ResponseModels\Widget\PlacementResponse;

class PlacementApi extends UuidCompleteResourceApi
{
    private const PLACEMENT_ENDPOINT  = 'content/placements/%s';
    private const PLACEMENTS_ENDPOINT = 'content/placements';

    public function multipleResourceUrl(): string
    {
        return self::PLACEMENTS_ENDPOINT;
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::PLACEMENT_ENDPOINT, $this->getUuid());
    }

    public function create(Placement $placement): void
    {
        $this->createResource($placement);
    }

    public function update(Placement $placement): void
    {
        $this->updateResource($placement);
    }

    public function get(): PlacementResponse
    {
        return new PlacementResponse($this->getResource());
    }
}
