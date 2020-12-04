<?php

namespace BigCommerce\ApiV3\Api\Widgets;

use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\Client;

class WidgetsApi
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function widget(string $id): WidgetApi
    {
        $widgetApi = $this->widgets();
        $widgetApi->setUuid($id);

        return $widgetApi;
    }

    public function widgets(): WidgetApi
    {
        return new WidgetApi($this->client);
    }

    public function template(string $id): WidgetTemplateApi
    {
        $templateApi = $this->templates();
        $templateApi->setUuid($id);

        return $templateApi;
    }

    public function templates(): WidgetTemplateApi
    {
        return new WidgetTemplateApi($this->client);
    }

    public function regions(string $templateFile): RegionApi
    {
        $regionApi = new RegionApi($this->client);
        $regionApi->setTemplateFile($templateFile);

        return $regionApi;
    }

    public function placements(): PlacementApi
    {
        return new PlacementApi($this->client);
    }

    public function placement(string $uuid): PlacementApi
    {
        $placementApi = $this->placements();
        $placementApi->setUuid($uuid);

        return $placementApi;
    }
}
