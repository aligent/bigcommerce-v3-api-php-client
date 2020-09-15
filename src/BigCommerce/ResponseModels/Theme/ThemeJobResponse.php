<?php

namespace BigCommerce\ApiV3\ResponseModels\Theme;

use BigCommerce\ApiV3\ResourceModels\Theme\ThemeJob;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ThemeJobResponse extends SingleResourceResponse
{
    private ThemeJob $job;

    public function getJob(): ThemeJob
    {
        return $this->job;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->job = new ThemeJob($rawData);
    }
}
