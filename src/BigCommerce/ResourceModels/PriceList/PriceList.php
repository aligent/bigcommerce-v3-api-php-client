<?php

namespace BigCommerce\ApiV3\ResourceModels\PriceList;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class PriceList extends ResourceModel
{
    public int $id;
    public string $name;
    public string $date_created;
    public string $date_modified;
    public bool $active;
}
