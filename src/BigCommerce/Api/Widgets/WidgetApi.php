<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResourceModels\Widget\Widget;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetResponse;
use BigCommerce\ApiV3\ResponseModels\Widget\WidgetsResponse;

class WidgetApi extends UuidResourceApi
{
    use CreateResource;
    use DeleteResource;
    use GetResource;
    use GetAllResources;
    use UpdateResource;

    private const WIDGETS_ENDPOINT = 'content/widgets';
    private const WIDGET_ENDPOINT  = 'content/widgets/%s';

    public function singleResourceUrl(): string
    {
        return sprintf(self::WIDGET_ENDPOINT, $this->getUuid());
    }

    public function multipleResourceUrl(): string
    {
        return self::WIDGETS_ENDPOINT;
    }

    public function get(): WidgetResponse
    {
        return new WidgetResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 0, int $limit = 250): WidgetsResponse
    {
        return new WidgetsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(Widget $widget): void
    {
        $this->createResource($widget);
    }

    public function update(Widget $widget): void
    {
        $this->updateResource($widget);
    }
}
