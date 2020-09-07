<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductImage;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class ProductImagesResponse extends PaginatedResponse
{
    /**
     * @return ProductImage[]
     */
    public function getProductImages(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ProductImage::class;
    }
}
