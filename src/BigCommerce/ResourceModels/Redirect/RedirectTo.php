<?php

namespace BigCommerce\ApiV3\ResourceModels\Redirect;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class RedirectTo extends ResourceModel
{
    public const TYPE__PRODUCT  = 'product';
    public const TYPE__BRAND    = 'brand';
    public const TYPE__CATEGORY = 'category';
    public const TYPE__PAGE     = 'page';
    public const TYPE__POST     = 'post';
    public const TYPE__URL      = 'url';

    public string $type;
    public ?int $entity_id;
    public ?string $url;

    public static function buildRedirectTo(string $type, ?int $entityId = null, ?string $url = null): RedirectTo
    {
        $redirectTo = new self();
        $redirectTo->type = $type;
        $redirectTo->entity_id = $entityId;
        $redirectTo->url = $url;

        return $redirectTo;
    }
}
