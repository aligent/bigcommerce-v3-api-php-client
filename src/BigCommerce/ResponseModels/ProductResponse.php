<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\Product;
use stdClass;

class ProductResponse extends SingleResourceResponse
{
    private Product $product;

    public function getProduct(): Product
    {
        return $this->product;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->product = new Product($rawData);
    }
}