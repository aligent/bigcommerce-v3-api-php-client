<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResourceModels\Widget\WidgetTemplate;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetTemplateResponse;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetTemplatesResponse;

class WidgetTemplateApi extends UuidResourceApi
{
    use CreateResource;
    use DeleteResource;
    use GetAllResources;
    use GetResource;
    use UpdateResource;

    private const TEMPLATE_ENDPOINT  = 'content/widget-templates';
    private const TEMPLATES_ENDPOINT = 'content/widget-templates/%s';

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
