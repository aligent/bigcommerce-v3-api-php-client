<?php

namespace BigCommerce\ApiV3\Api\Catalog;

use BigCommerce\ApiV3\Api\Catalog\BrandsApi;
use BigCommerce\ApiV3\Api\Catalog\CategoriesApi;
use BigCommerce\ApiV3\Api\Catalog\ProductsApi;
use BigCommerce\ApiV3\Api\Catalog\SummaryApi;
use BigCommerce\ApiV3\Client;

class CatalogApi
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function products(): ProductsApi
    {
        return new ProductsApi($this->client);
    }

    public function product(int $productId): ProductsApi
    {
        return new ProductsApi($this->client, $productId);
    }

    public function categories(): CategoriesApi
    {
        return new CategoriesApi($this->client);
    }

    public function category(int $categoryId): CategoriesApi
    {
        return new CategoriesApi($this->client, $categoryId);
    }

    public function brands(): BrandsApi
    {
        return new BrandsApi($this->client);
    }

    public function brand(int $brandId): BrandsApi
    {
        return new BrandsApi($this->client, $brandId);
    }

    public function summary(): SummaryApi
    {
        return new SummaryApi($this->client);
    }
}
