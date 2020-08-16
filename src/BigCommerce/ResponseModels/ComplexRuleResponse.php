<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ComplexRule;
use stdClass;

class ComplexRuleResponse extends SingleResourceResponse
{
    private ComplexRule $complexRule;

    public function getComplexRule(): ComplexRule
    {
        return $this->complexRule;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->complexRule = new ComplexRule($rawData);
    }
}
