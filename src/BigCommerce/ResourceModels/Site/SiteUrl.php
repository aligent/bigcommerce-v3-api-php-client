<?php

namespace BigCommerce\ApiV3\ResourceModels\Site;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class SiteUrl extends ResourceModel
{
    public const TYPE_PRIMARY   = 'primary';
    public const TYPE_CANONICAL = 'canonical';
    public const TYPE_CHECKOUT  = 'checkout';

    public string $url;
    public string $type;
    public string $created_at;
    public string $updated_at;
}
