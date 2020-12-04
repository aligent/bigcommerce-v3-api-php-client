<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\Widget;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class WidgetResponse extends SingleResourceResponse
{
    private Widget $widget;

    public function getWidget(): Widget
    {
        return $this->widget;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->widget = new Widget($rawData);
    }
}
