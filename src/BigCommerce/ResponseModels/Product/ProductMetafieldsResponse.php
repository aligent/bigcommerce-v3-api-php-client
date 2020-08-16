<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductMetafield;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductMetafieldsResponse extends PaginatedResponse
{
    /**
     * @var ProductMetafield[]
     */
    private array $metafields;

    /**
     * @return ProductMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->metafields;
    }

    protected function addData(array $data): void
    {
        $this->metafields = array_map(function (\stdClass $m) {
            return new ProductMetafield($m);
        }, $data);
    }
}
