<?php


namespace BigCommerce\ApiV3\ResponseModels\Product;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\Product;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;

class ProductsResponse extends PaginatedBatchableResponse
{
    /**
     * @var Product[]
     */
    private array $products;

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    protected function addData(array $data): void
    {
        $this->products = array_map(function(\stdClass $p) { return new Product($p); }, $data);
    }

    /**
     * @return Product[]
     */
    protected function getData(): array
    {
        return $this->getProducts();
    }

    protected function setData(array $data): void
    {
        $this->products = $data;
    }
}
