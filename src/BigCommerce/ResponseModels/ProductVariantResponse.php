<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductVariant;
use stdClass;

class ProductVariantResponse extends SingleResourceResponse
{
    private ProductVariant $productVariant;

    /**
     * @return ProductVariant
     */
    public function getProductVariant(): ProductVariant
    {
        return $this->productVariant;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->productVariant = new ProductVariant($rawData);
    }
}
