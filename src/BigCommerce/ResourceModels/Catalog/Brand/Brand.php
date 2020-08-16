<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Brand;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Brand extends ResourceModel
{
    public int $id;
    public string $name;
    public array $meta_keywords;
    public ?string $meta_description;
    public string $image_url;
    public string $search_keywords;
    public ?object $custom_url;
}
