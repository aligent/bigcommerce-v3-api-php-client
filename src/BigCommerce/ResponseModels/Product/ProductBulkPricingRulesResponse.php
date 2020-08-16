<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductBulkPricingRule;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductBulkPricingRulesResponse extends PaginatedResponse
{
    /**
     * @var ProductBulkPricingRule[]
     */
    private array $bulkPricingRules;

    /**
     * @return ProductBulkPricingRule[]
     */
    public function getBulkPricingRules(): array
    {
        return $this->bulkPricingRules;
    }

    protected function addData(array $data): void
    {
        $this->bulkPricingRules = array_map(function (\stdClass $r) {
            return new ProductBulkPricingRule($r);
        }, $data);
    }
}
