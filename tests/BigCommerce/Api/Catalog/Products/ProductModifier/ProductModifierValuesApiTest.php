<?php

namespace BigCommerce\Tests\Api\Catalog\Products\ProductModifier;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierValueData;
use BigCommerce\Tests\BigCommerceApiTest;

class ProductModifierValuesApiTest extends BigCommerceApiTest
{
    public function testCanGetModifierValue()
    {
        $this->setReturnData('catalog__products__modifiers__222__values__190__get.json');

        $modifierValue = $this->getApi()
            ->catalog()->product(1)->modifier(222)->value(190)->get()->getModifierValue();

        $this->assertEquals('Yes', $modifierValue->label);
        $this->assertEquals(5, $modifierValue->adjusters->price->adjuster_value);
    }

    public function testCanGetModifierValues()
    {
        $this->setReturnData('catalog__products__modifiers__222__values__get_all.json');

        $modifierValues = $this->getApi()
            ->catalog()->product(1)->modifier(222)->values()->getAll()->getModifierValues();

        $this->assertCount(2, $modifierValues);
        $this->assertTrue($modifierValues[0]->value_data->checked_value);
        $this->assertFalse($modifierValues[1]->value_data->checked_value);
    }

    public function testCanUpdateModifierValue()
    {
        $this->setReturnData('catalog__products__modifiers__222__values__190__get.json');

        $modifierValue = $this->getApi()
            ->catalog()->product(1)->modifier(222)->value(190)->get()->getModifierValue();

        $modifierValue->value_data = new ProductModifierValueData();
        $modifierValue->value_data->checked_value = false;
        $modifierValue->label = "Yesish";

        $expectedJson = <<<EOT
{
    "id": 190,
    "option_id": 222,
    "label": "Yesish",
    "sort_order": 0,
    "value_data": {
        "checked_value": false
    },
    "is_default": false,
    "adjusters": {
      "price": {
        "adjuster": "relative",
        "adjuster_value": 5
      },
      "image_url": "",
      "purchasing_disabled": {
        "status": false,
        "message": ""
      }
    }
  }
EOT;


        $this->assertJsonStringEqualsJsonString($expectedJson, json_encode($modifierValue));
    }
}
