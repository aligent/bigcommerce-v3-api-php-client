<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ComplexRule;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ComplexRulesResponse extends PaginatedResponse
{
    /**
     * @return ComplexRule[]
     */
    public function getComplexRules(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ComplexRule::class;
    }
}
