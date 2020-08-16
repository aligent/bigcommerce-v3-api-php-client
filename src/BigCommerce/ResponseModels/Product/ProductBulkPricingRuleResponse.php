<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductBulkPricingRule;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductBulkPricingRuleResponse extends SingleResourceResponse
{
    private ProductBulkPricingRule $rule;

    public function getRule(): ProductBulkPricingRule
    {
        return $this->rule;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->rule = new ProductBulkPricingRule($rawData);
    }
}
