<?php


namespace BigCommerce\ApiV3\Catalog\Products;


use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Product\ProductBulkPricingRuleResponse;
use BigCommerce\ApiV3\ResponseModels\Product\ProductBulkPricingRulesResponse;

class ProductBulkPricingRulesApi extends ResourceApi
{
    const RESOURCE_NAME = 'bulk-pricing-rules';
    const BULK_PRICING_RULE_ENDPOINT  = 'catalog/products/{product_id}/bulk-pricing-rules/%d';
    const BULK_PRICING_RULES_ENDPOINT = 'catalog/products/{product_id}/bulk-pricing-rules';

    protected function singleResourceEndpoint(): string
    {
        return self::BULK_PRICING_RULE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::BULK_PRICING_RULES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        self::RESOURCE_NAME;
    }

    public function get(): ProductBulkPricingRuleResponse
    {
        return new ProductBulkPricingRuleResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ProductBulkPricingRulesResponse
    {
        return new ProductBulkPricingRulesResponse($this->getAllResources($filters, $page, $limit));
    }
}
