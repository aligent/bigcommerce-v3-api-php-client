<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVariantsResponse extends PaginatedResponse
{
    /**
     * @var ProductVariant[]
     */
    private array $productVariants;

    /**
     * @return ProductVariant[]
     */
    public function getProductVariants(): array
    {
        return $this->productVariants;
    }

    protected function addData(array $data): void
    {
        $this->productVariants = array_map(function (\stdClass $v) {
            return new ProductVariant($v);
        }, $data);
    }
}
