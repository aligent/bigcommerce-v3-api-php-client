<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\Placement;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class PlacementResponse extends SingleResourceResponse
{
    private Placement $placement;

    public function getPlacement(): Placement
    {
        return $this->placement;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->placement = new Placement($rawData);
    }
}
