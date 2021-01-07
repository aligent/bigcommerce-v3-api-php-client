<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\WidgetTemplate;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class WidgetTemplatesResponse extends PaginatedResponse
{
    /**
     * @return WidgetTemplate[]
     */
    public function getTemplates(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return WidgetTemplate::class;
    }
}
