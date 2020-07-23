<?php


namespace BigCommerce\ApiV3\ResourceModels\Catalog\Brand;


use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class BrandMetafield extends ResourceModel
{
    public int $id;
    public string $key;
    public string $value;
    public string $namespace;
    public string $permission_set;
    public string $resource_type;
    public int $resource_id;
    public string $description;
    public string $date_created;
    public string $date_modified;
}
