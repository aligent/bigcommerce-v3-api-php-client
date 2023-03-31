<?php

namespace BigCommerce\ApiV3\ResourceModels\Page;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Page extends ResourceModel
{
    public int $id;
    public string $name;
    public ?string $email;
    public string $meta_title;
    public ?string $body;
    public ?string $feed;
    public ?string $link;
    public ?string $contact_fields;
    public ?string $meta_keywords;
    public ?string $meta_description;
    public ?string $search_keywords;
    public bool $is_visible;
    public int $parent_id;
    public int $sort_order;
    /**
     * Determines the type of the page.
     * Allowed values: page, raw, contact_form, feed, link, blog
     */
    public string $type;
    public bool $is_homepage;
    public bool $is_customers_only;
    public string $url;
    public int $channel_id;
}
