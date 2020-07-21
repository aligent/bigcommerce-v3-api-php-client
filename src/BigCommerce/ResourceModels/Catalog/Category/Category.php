<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Category;


use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Category extends ResourceModel
{
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
    public object $custom_url;
}