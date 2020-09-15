<?php

namespace BigCommerce\ApiV3\ResponseModels\Theme;

use BigCommerce\ApiV3\ResourceModels\Theme\Theme;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ThemesResponse extends PaginatedResponse
{
    /**
     * @return Theme[]
     */
    public function getThemes(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Theme::class;
    }
}
