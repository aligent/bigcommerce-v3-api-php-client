<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierConfig;
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
    }

    public function testCanUpdateModifierConfigs(): void
    {
        $textConfig = new ProductModifierConfig((object)[
            "default_value"   => "",
            "text_characters_limited" => false,
            "text_min_length" => 0,
            "text_max_length" => 0
        ]);

        $dateConfig =  new ProductModifierConfig((object)[
            "date_limited"      => false,
            "date_limit_mode"   => "earliest",
            "date_earliest_value" => null,
            "date_latest_value" => null,
            "default_value"     => "2022-06-01T00:00:00+00:00"
        ]);

        $fileConfig =  new ProductModifierConfig((object)[
            "file_types_mode" => "specific",
            "file_types_supported" => [
                "images"
            ],
            "file_types_other" => [],
            "file_max_size" => 524288
        ]);

        $this->assertEquals(
            '{"default_value":"","text_characters_limited":false,"text_min_length":0,"text_max_length":0}',
            json_encode($textConfig)
        );

        $this->assertEquals(
            '{"default_value":"2022-06-01T00:00:00+00:00","date_limited":false,"date_limit_mode":"earliest"}',
            json_encode($dateConfig)
        );

        $this->assertEquals(
            '{"file_types_mode":"specific","file_types_supported":["images"],' .
            '"file_types_other":[],"file_max_size":524288}',
            json_encode($fileConfig)
        );
    }
}
