<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Brand;

use BigCommerce\ApiV3\ResourceModels\HasCustomUrl;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Brand extends ResourceModel
{
    use HasCustomUrl;

    public int $id;
    public string $name;
    public array $meta_keywords;
    public ?string $meta_description;
    public string $image_url;
    public string $search_keywords;
    public string $page_title;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject)) {
            $this->buildCustomUrl($optionObject);
        }
        parent::__construct($optionObject);
    }
}
