<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;

class CategoriesResponse extends PaginatedResponse
{
    private array $categories;

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    protected function addData(array $data): void
    {
        $this->categories = array_map(function(\stdClass $c) { return new Category($c); }, $data);
    }
}
