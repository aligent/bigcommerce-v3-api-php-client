<?php

namespace BigCommerce\ApiV3\ResourceModels\Channel;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Channel extends ResourceModel
{
    public const TYPE__POS         = 'pos';
    public const TYPE__MARKETPLACE = 'marketplace';
    public const TYPE__STOREFRONT  = 'storefront';
    public const TYPE__MARKETING   = 'marketing';

    public const PLATFORM__BIGCOMMERCE  = 'bigcommerce';
    public const PLATFORM__ACQUIA       = 'acquia';
    public const PLATFORM__BLOOMREACH   = 'bloomreach';
    public const PLATFORM__DEITY        = 'deity';
    public const PLATFORM__DRUPAL       = 'drupal';
    public const PLATFORM__NEXT         = 'next';
    public const PLATFORM__WORDPRESS    = 'wordpress';
    public const PLATFORM__AMAZON       = 'amazon';
    public const PLATFORM__EBAY         = 'ebay';
    public const PLATFORM__FACEBOOK     = 'facebook';
    public const PLATFORM__GOOGLE_SHOPPING = 'google_shopping';
    public const PLATFORM__CLOVER       = 'clover';
    public const PLATFORM__SQUARE       = 'square';
    public const PLATFORM__VEND         = 'vend';
    public const PLATFORM__CUSTOM       = 'custom';

    public const STATUS__ACTIVE         = 'active';
    public const STATUS__PRELAUNCH      = 'prelaunch';
    public const STATUS__INACTIVE       = 'inactive';
    public const STATUS__CONNECTED      = 'connected';
    public const STATUS__DISCONNECTED   = 'disconnected';

    public int $id;
    public string $type;
    public string $platform;
    public string $date_created;
    public string $date_modified;
    public object $config_meta;
    public string $external_id;
    public bool $is_listable_from_ui;
    public bool $is_visible;
    public string $name;
    public string $status;
    public bool $is_enabled;
}
