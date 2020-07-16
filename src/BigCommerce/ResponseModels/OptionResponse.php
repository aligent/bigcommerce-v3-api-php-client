<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOption;
use stdClass;

class OptionResponse extends SingleResourceResponse
{
    private ProductOption $option;

    public function getOption(): ProductOption
    {
        return $this->option;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->option = new ProductOption($rawData);
    }
}