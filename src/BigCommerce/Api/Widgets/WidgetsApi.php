<?php

namespace BigCommerce\ApiV3\Api\Widgets;

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
        $widgetApi = new WidgetApi($this->client);
        $widgetApi->setUuid($id);

        return $widgetApi;
    }

    public function widgets(): WidgetApi
    {
        return new WidgetApi($this->client);
    }

    public function template(string $id): WidgetTemplateApi
    {
        $templateApi = new WidgetTemplateApi($this->client);
        $templateApi->setUuid($id);

        return $templateApi;
    }

    public function templates(): WidgetTemplateApi
    {
        return new WidgetTemplateApi($this->client);
    }
}
