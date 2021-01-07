<?php

namespace BigCommerce\ApiV3\ResponseModels\Brand;

use BigCommerce\ApiV3\Api\Generic\FetchAllPages;
use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;

class BrandsResponse extends PaginatedResponse
{
    use FetchAllPages;

    /**
     * @return Brand[]
     */
    public function getBrands(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Brand::class;
    }
}
