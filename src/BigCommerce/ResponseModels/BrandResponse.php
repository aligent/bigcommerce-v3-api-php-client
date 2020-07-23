<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand;
use stdClass;

class BrandResponse extends SingleResourceResponse
{
    private Brand $brand;

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->brand = new Brand($rawData);
    }
}