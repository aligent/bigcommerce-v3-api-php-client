<?php

namespace BigCommerce\ApiV3\ResponseModels\Product;

use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductImage;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use stdClass;

class ProductImageResponse extends SingleResourceResponse
{
    private ProductImage $productImage;

    public function getProductImage(): ProductImage
    {
        return $this->productImage;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->productImage = new ProductImage($rawData);
    }
}
