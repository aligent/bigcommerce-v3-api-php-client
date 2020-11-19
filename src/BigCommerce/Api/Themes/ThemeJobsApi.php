<?php

namespace BigCommerce\ApiV3\Api\Themes;

use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResponseModels\Theme\ThemeJobResponse;

class ThemeJobsApi extends UuidResourceApi
{
    use GetResource;

    private const THEME_JOB_ENDPOINT = 'themes/jobs/%s';

    public function get(): ThemeJobResponse
    {
        return new ThemeJobResponse($this->getResource());
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::THEME_JOB_ENDPOINT, $this->getUuid());
    }
}
