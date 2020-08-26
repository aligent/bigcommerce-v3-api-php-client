<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Category;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class CategoryTreeBranch extends ResourceModel
{
    public int $id;
    public int $parent_id;
    public string $name;
    public bool $is_visible;
    public string $url;

    /**
     * @var CategoryTreeBranch[]
     */
    public array $children = [];

    public function __construct(?stdClass $optionObject = null)
    {
        foreach ($optionObject->children as $categoryData) {
            $this->children[] = $categoryData instanceof CategoryTreeBranch
                ? $categoryData : new CategoryTreeBranch($categoryData);
        }

        unset($optionObject->children);
        parent::__construct($optionObject);
    }
}
