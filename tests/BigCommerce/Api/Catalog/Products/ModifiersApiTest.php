<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ModifiersApiTest extends BigCommerceApiTest
{
    public function testHasProductAndModifierId(): void
    {
        $this->markTestIncomplete();
    }

    public function testCanGetModifier(): void
    {
        $this->markTestIncomplete();
    }

    public function testCanGetAllModifiers(): void
    {
        $this->setReturnData('catalog__products__modifiers__6962__values__get_all.json');

        $modifiers = $this->getApi()->catalog()->product(6962)->modifiers()->getAll()->getProductModifiers();

        $this->assertCount(8, $modifiers);
        $this->assertEquals('earliest', $modifiers[5]->config->date_limit_mode);
        $this->assertEquals(['images'], $modifiers[6]->config->file_types_supported);
        $this->assertEquals(20, $modifiers[7]->config->text_max_lines);
        $this->markTestIncomplete();
    }
}
