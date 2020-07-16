<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Category\Category;
use stdClass;

class CategoryResponse extends SingleResourceResponse
{
    private Category $category;

    public function getCategory(): Category
    {
        return $this->category;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->category = new Category($rawData);
    }
}
