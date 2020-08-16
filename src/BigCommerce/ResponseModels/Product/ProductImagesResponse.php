<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductImage;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductImagesResponse extends PaginatedResponse
{
    /**
     * @var ProductImage[]
     */
    private array $productImages;

    /**
     * @return ProductImage[]
     */
    public function getProductImages(): array
    {
        return $this->productImages;
    }

    protected function addData(array $data): void
    {
        $this->productImages = array_map(function (\stdClass $v) {
            return new ProductImage($v);
        }, $data);
    }
}
