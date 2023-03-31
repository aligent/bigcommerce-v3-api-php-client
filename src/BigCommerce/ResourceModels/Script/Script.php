<?php

namespace BigCommerce\ApiV3\ResourceModels\Script;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Script extends ResourceModel
{
    public const LOAD_METHOD__DEFAULT = 'default';
    public const LOAD_METHOD__ASYNC   = 'async';
    public const LOAD_METHOD__DEFER   = 'defer';

    public const VISIBILITY__STOREFRONT         = 'storefront';
    public const VISIBILITY__CHECKOUT           = 'checkout';
    public const VISIBILITY__ALL_PAGES          = 'all_pages';
    public const VISIBILITY__ORDER_CONFIRMATION = 'order_confirmation';

    public string $uuid;
    public string $date_created;
    public string $date_modified;
    public string $description;
    public string $html;
    public string $src;
    public bool $auto_uninstall;
    public string $load_method;
    public string $location;
    public string $visibility;
    public string $kind;
    public string $api_client_id;
    public string $consent_category;
    public bool $enabled;
    public string $name;
}
