<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ComplexRule;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ComplexRulesResponse extends PaginatedResponse
{
    /**
     * @var ComplexRule[]
     */
    private array $complexRules;

    /**
     * @return ComplexRule[]
     */
    public function getComplexRules(): array
    {
        return $this->complexRules;
    }

    protected function addData(array $data): void
    {
        $this->complexRules = array_map(function(\stdClass $r) { return new ComplexRule($r); }, $data);
    }
}
