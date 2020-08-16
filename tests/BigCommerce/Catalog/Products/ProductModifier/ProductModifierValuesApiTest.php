<?php

namespace BigCommerce\ApiV3\Catalog\Products\ProductModifier;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductModifierValuesApiTest extends BigCommerceApiTest
{
    public function testHasProductModifierAndValueId(): void
    {
        $expectedProductId  = 687;
        $expectedModifierId = 3;
        $expectedValueId    = 1990;

        $modifierValueApi = $this->getApi()
            ->catalog()->product($expectedProductId)->modifier($expectedModifierId)->value($expectedValueId);
        $this->assertEquals($expectedModifierId, $modifierValueApi->getParentResourceId());
        $this->assertEquals($expectedValueId, $modifierValueApi->getResourceId());
        $this->assertEquals($expectedProductId, $modifierValueApi->getProductId());
    }

    public function testCanGetProductModiferValue(): void
    {
        $this->setReturnData('catalog__products__modifiers__222__values__190__get.json');

        $response = $this->getApi()->catalog()->product(158)->modifier(222)->value(190)->get();

        $this->assertEquals('Yes', $response->getModifierValue()->label);
    }

    public function testCanGetAllProductModiferValues(): void
    {
        $this->setReturnData('catalog__products__modifiers__222__values__get_all.json');

        $response = $this->getApi()->catalog()->product(11)->modifier(222)->values()->getAll();
        $this->assertEquals(2, $response->getPagination()->total);
        $this->assertEquals('No', $response->getModifierValues()[1]->label);
    }
}
