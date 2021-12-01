<?php

namespace BigCommerce\Tests\Api\Catalog\Products\ProductOption;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOptionValue;
use BigCommerce\Tests\BigCommerceApiTest;

class ProductOptionValuesApiTest extends BigCommerceApiTest
{
    public function testHasProductIdAndOptionIdOnCreate(): void
    {
        $this->setReturnData('catalog__products__1__options__2__values__create.json');
        $productId = 1;
        $optionId = 2;

        $optionValue = new ProductOptionValue();
        $optionValue->sort_order = 2;
        $optionValue->is_default = true;
        $optionValue->label      = 'Colors';
        $optionValue->value_data = (object)[
            "colors" => ["#123c91, #FFFF00, #397a44"]
        ];

        $productOptionValuesApi = $this->getApi()->catalog()->product($productId)->option($optionId)->values();
        $this->assertEquals($productId, $productOptionValuesApi->getProductId(), 'Product ID not set correctly');
        $this->assertEquals($optionId, $productOptionValuesApi->getParentResourceId(), 'Option ID not set correctly');
        $productOptionValuesApi->create($optionValue);
        $this->assertEquals("catalog/products/{$productId}/options/{$optionId}/values", $this->getLastRequestPath());
    }
}
