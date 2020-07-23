<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\Api\FetchAllPages;
use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\Brand;

class BrandsResponse extends PaginatedResponse
{
    use FetchAllPages;

    /**
     * @var Brand[]
     */
    private array $brands;

    /**
     * @return Brand[]
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    protected function addData(array $data): void
    {
        $this->setData(array_map(function(\stdClass $b) { return new Brand($b); }, $data));
    }

    protected function getData(): array
    {
        return $this->getBrands();
    }

    protected function setData(array $data): void
    {
        $this->brands = $data;
    }
}
