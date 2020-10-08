<?php

namespace BigCommerce\ApiV3\ResponseModels\Theme;

use BigCommerce\ApiV3\ResourceModels\Theme\Theme;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ThemeResponse extends SingleResourceResponse
{
    private Theme $theme;

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->theme = new Theme($rawData);
    }
}
