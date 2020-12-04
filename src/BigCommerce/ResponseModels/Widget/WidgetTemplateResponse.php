<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\WidgetTemplate;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class WidgetTemplateResponse extends SingleResourceResponse
{
    private WidgetTemplate $template;

    public function getTemplate(): WidgetTemplate
    {
        return $this->template;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->template = new WidgetTemplate($rawData);
    }
}
