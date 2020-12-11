<?php

namespace BigCommerce\Tests\Api\Widgets;

use BigCommerce\Tests\BigCommerceApiTest;

class WidgetApiTest extends BigCommerceApiTest
{
    public function testCanGetWidget(): void
    {
        $this->setReturnData('content__widgets__456__get.json');

        $widget = $this->getApi()->widgets()->widget('456851d3-0125-440e-820d-1b11c19da553')->get()->getWidget();
        $this->assertEquals('Header Images', $widget->name);
    }

    public function testCanGetTemplateFromWidget(): void
    {
        $this->setReturnData('content__widgets__456__get.json');

        $widget = $this->getApi()->widgets()->widget('456851d3-0125-440e-820d-1b11c19da553')->get()->getWidget();
        $this->assertEquals('Header Images', $widget->widget_template->name);
    }

    public function testCanGetWidgets(): void
    {
        $this->setReturnData('content__widgets__get_all.json');

        $widgets = $this->getApi()->content()->widgets()->getAll()->getWidgets();
        $this->assertCount(1, $widgets);
        $this->assertEquals('a8940709-5655-4401-a341-62c44e3180b2', $widgets[0]->uuid);
    }
}
