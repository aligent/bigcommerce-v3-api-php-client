<?php


namespace BigCommerce\ApiV3\ResponseModels\Product;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifierValue;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductModifierValuesResponse extends PaginatedResponse
{
    /**
     * @var ProductModifierValue[]
     */
    private array $modifierValues;

    /**
     * @return ProductModifierValue[]
     */
    public function getModifierValues(): array
    {
        return $this->modifierValues;
    }

    protected function addData(array $data): void
    {
        $this->modifierValues = array_map(function(\stdClass $v) { return ProductModifierValue::BuildFromResponse($v); }, $data);
    }
}
