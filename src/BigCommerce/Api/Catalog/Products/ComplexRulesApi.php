<?php

namespace BigCommerce\ApiV3\Api\Catalog\Products;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ComplexRule;
use BigCommerce\ApiV3\ResponseModels\ComplexRuleResponse;
use BigCommerce\ApiV3\ResponseModels\ComplexRulesResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ComplexRulesApi extends ResourceApi
{
    public const RESOURCE_NAME    = 'complex-rules';
    public const COMPLEX_RULES_ENDPOINT  = 'catalog/products/%d/complex-rules';
    public const COMPLEX_RULE_ENDPOINT = 'catalog/products/%d/complex-rules/%d';

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function create(ComplexRule $complexRule): ComplexRuleResponse
    {
        return new ComplexRuleResponse($this->createResource($complexRule));
    }

    public function update(ComplexRule $complexRule): ComplexRuleResponse
    {
        return new ComplexRuleResponse($this->updateResource($complexRule));
    }

    public function get(): ComplexRuleResponse
    {
        return new ComplexRuleResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ComplexRulesResponse
    {
        return new ComplexRulesResponse($this->getAllResources($filters, $page, $limit));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::COMPLEX_RULE_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::COMPLEX_RULES_ENDPOINT;
    }
}
