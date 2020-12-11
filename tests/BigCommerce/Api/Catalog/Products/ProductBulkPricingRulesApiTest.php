<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class ProductBulkPricingRulesApiTest extends BigCommerceApiTest
{
    public function testHasProductAndRuleId(): void
    {
        $expectedProductId = 12;
        $expectedRuleId = 32;

        $imageApi = $this->getApi()->catalog()->product($expectedProductId)->bulkPricingRule($expectedRuleId);
        $this->assertEquals($expectedProductId, $imageApi->getParentResourceId());
        $this->assertEquals($expectedRuleId, $imageApi->getResourceId());
    }

    public function testCanGetBulkPricingRule(): void
    {
        $productId = 100;
        $ruleId    = 83;
        $this->setReturnData('catalog__products__bulk_pricing_rules__83__get.json');

        $bulkPricingRuleResponse = $this->getApi()->catalog()->product($productId)->bulkPricingRule($ruleId)->get();
        $this->assertEquals($ruleId, $bulkPricingRuleResponse->getRule()->id);
    }
    public function testCanGetAllBulkPricingRules(): void
    {
        $this->setReturnData('catalog__products__bulk_pricing_rules__get_all.json');

        $bulkPricingRulesResponse = $this->getApi()->catalog()->product(123)->bulkPricingRules()->getAll();

        $this->assertEquals(2, $bulkPricingRulesResponse->getPagination()->total);
        $this->assertCount(2, $bulkPricingRulesResponse->getBulkPricingRules());
    }
}
