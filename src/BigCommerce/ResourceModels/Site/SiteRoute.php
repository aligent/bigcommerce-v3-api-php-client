<?php

namespace BigCommerce\ApiV3\ResourceModels\Site;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class SiteRoute extends ResourceModel
{
    public const TYPE_PRODUCT = 'product';
    public const TYPE_BRAND = 'brand';
    public const TYPE_CATEGORY = 'category';
    public const TYPE_PAGE = 'page';
    public const TYPE_BLOG = 'blog';
    public const TYPE_HOME = 'home';
    public const TYPE_CART = 'cart';
    public const TYPE_CHECKOUT = 'checkout';
    public const TYPE_SEARCH = 'search';
    public const TYPE_ACCOUNT = 'account';
    public const TYPE_LOGIN = 'login';
    public const TYPE_RETURNS = 'returns';
    public const TYPE_STATIC = 'static';

    public int $id;
    public string $type;
    public string $matching;
    public string $route;
}
