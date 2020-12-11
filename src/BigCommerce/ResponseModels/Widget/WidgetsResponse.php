<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\Widget;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class WidgetsResponse extends PaginatedResponse
{
    /**
     * @return Widget[]
     */
    public function getWidgets(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Widget::class;
    }
}
