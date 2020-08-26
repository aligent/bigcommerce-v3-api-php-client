<?php

namespace BigCommerce\ApiV3\ResourceModels;

abstract class Metafield extends ResourceModel
{
    /**
     * Private to the app that owns the field
     */
    public const PERMISSION__APP_ONLY = 'app_only';

    /**
     * Visible to all API consumers
     */
    public const PERMISSION__READ = 'read';

    /**
     * Writeable by all API consumers
     */
    public const PERMISSION__WRITE = 'write';

    /**
     * Visible to all API consumers, and available on the storefront (e.g. via GraphQL)
     */
    public const PERMISSION__READ_AND_STOREFRONT = 'read_and_sf_access';

    /**
     * Writeable by to all API consumers, and available on the storefront (e.g. via GraphQL)
     */
    public const PERMISSION__WRITE_AND_STOREFRONT = 'write_and_sf_access';

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
