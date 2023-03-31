<?php

namespace BigCommerce\ApiV3\ResourceModels\Redirect;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

/**
 * Redirect Resource
 *
 * Represents the request object for redirect objects.
 *
 * Contains a convenience method for simply redirecting to a product or category
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $productRedirect = new Redirect();
 * $productRedirect->site_id = 1000;
 * $productRedirect->from_path = '/cool-product.html';
 * $productRedirect->toProduct(123);
 *
 * $api->redirects()->upsert([$productRedirect]);
 * ```
 *
 */
class Redirect extends ResourceModel
{
    public string $from_path;
    public int $site_id;
    public RedirectTo $to;
    public int $id;
    public string $to_url;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->to)) {
            $this->to = new RedirectTo($optionObject->to);
            unset($optionObject->to);
        }

        parent::__construct($optionObject);
    }

    public function toProduct(int $productId): void
    {
        $this->to = RedirectTo::buildRedirectTo(RedirectTo::TYPE__PRODUCT, $productId);
    }

    public function toCategory(int $categoryId): void
    {
        $this->to = RedirectTo::buildRedirectTo(RedirectTo::TYPE__CATEGORY, $categoryId);
    }
}
