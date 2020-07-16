<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductModifier;

class ModifiersResponse extends PaginatedResponse
{
    /**
     * @var ProductModifier[]
     */
    private array $productModifiers;

    /**
     * @return ProductModifier[]
     */
    public function getProductModifiers(): array
    {
        return $this->productModifiers;
    }

    protected function addData(array $data): void
    {
        $this->productModifiers = array_map(function(\stdClass $m) { return new ProductModifier($m); }, $data);
    }
}
