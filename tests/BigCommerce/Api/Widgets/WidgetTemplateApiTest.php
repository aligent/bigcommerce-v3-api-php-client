<?php

namespace BigCommerce\Tests\Api\Widgets;

use BigCommerce\Tests\BigCommerceApiTest;

class WidgetTemplateApiTest extends BigCommerceApiTest
{
    public function testCanGetTemplate(): void
    {
        $this->setReturnData('content__widget_templates__get.json');
        $id = 'c48b131a-ae9d-4767-b5d6-63d9e43bcf75';

        $template = $this->getApi()->widgets()->template($id)->get()->getTemplate();
        $this->assertEquals('Header Images', $template->name);
        $this->assertEquals("content/widget-templates/$id", $this->getLastRequestPath());
    }

    public function testCanGetTemplates(): void
    {
        $this->setReturnData('content__widget_templates__get_all.json');

        $templates = $this->getApi()->widgets()->templates()->getAll()->getTemplates();
        $this->assertCount(12, $templates);
        $this->assertEquals('{{{html}}}', $templates[2]->template);
        $this->assertEquals("content/widget-templates", $this->getLastRequestPath());
    }
}
