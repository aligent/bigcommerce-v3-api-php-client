<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariantMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductVariantMetafieldsResponse extends PaginatedResponse
{
    /**
     * @var ProductVariantMetafield[]
     */
    private array $metafields;

    /**
     * @return ProductVariantMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->metafields;
    }

    protected function addData(array $data): void
    {
        $this->metafields = array_map(function (\stdClass $m) {
            return new ProductVariantMetafield($m);
        }, $data);
    }
}
