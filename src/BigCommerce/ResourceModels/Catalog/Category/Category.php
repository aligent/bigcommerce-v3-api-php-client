<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Category;

use BigCommerce\ApiV3\ResourceModels\HasCustomUrl;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Category extends ResourceModel
{
    use HasCustomUrl;

    public int $id;
    public int $parent_id;
    public string $name;
    public string $description;
    public int $views;
    public int $sort_order;
    public string $page_title;
    public array $meta_keywords;
    public ?string $meta_description;
    public string $layout_file;
    public string $image_url;
    public bool $is_visible;
    public string $search_keywords;
    public string $default_product_sort;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject)) {
            $this->buildCustomUrl($optionObject);
        }
        parent::__construct($optionObject);
    }
}
