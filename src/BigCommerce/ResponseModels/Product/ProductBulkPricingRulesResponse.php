<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductBulkPricingRule;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductBulkPricingRulesResponse extends PaginatedResponse
{
    /**
     * @return ProductBulkPricingRule[]
     */
    public function getBulkPricingRules(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductBulkPricingRule::class;
    }
}
