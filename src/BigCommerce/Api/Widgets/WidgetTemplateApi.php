<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\UuidCompleteResourceApi;
use BigCommerce\ApiV3\ResourceModels\Widget\WidgetTemplate;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetTemplateResponse;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetTemplatesResponse;

class WidgetTemplateApi extends UuidCompleteResourceApi
{
    private const TEMPLATE_ENDPOINT  = 'content/widget-templates/%s';
    private const TEMPLATES_ENDPOINT = 'content/widget-templates';

    public function multipleResourceUrl(): string
    {
        return self::TEMPLATES_ENDPOINT;
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::TEMPLATE_ENDPOINT, $this->getUuid());
    }

    public function get(): WidgetTemplateResponse
    {
        return new WidgetTemplateResponse($this->getResource());
    }

    public function create(WidgetTemplate $widgetTemplate): void
    {
        $this->create($widgetTemplate);
    }

    public function update(WidgetTemplate $widgetTemplate): void
    {
        $this->updateResource($widgetTemplate);
    }

    public function getAll(array $filters = [], int $page = 0, int $limit = 250): WidgetTemplatesResponse
    {
        return new WidgetTemplatesResponse($this->getAllResources($filters, $page, $limit));
    }
}
