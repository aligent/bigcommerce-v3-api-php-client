<?php

namespace BigCommerce\ApiV3\ResourceModels\Cart;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Cart extends ResourceModel
{
    public string $id;
    public string $parent_id;
    public int $customer_id;
    public string $email;
    public $currency;
    public bool $tax_included;
    public float $base_amount;
    public float $discount_amount;
    public float $cart_amount;
    public array $coupons;
    public array $discounts;
    public $line_items;
    public string $created_time;
    public string $updated_time;
    public int $channel_id;
    public string $locale;
    public ?CartRedirectUrls $redirect_urls;

    protected function beforeBuildObject(): void
    {
        parent::beforeBuildObject();
        self::buildPropertyObject('redirect_urls', CartRedirectUrls::class);
    }
}
