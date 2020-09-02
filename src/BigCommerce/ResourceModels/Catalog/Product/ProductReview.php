<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductReview extends ResourceModel
{
    public const STATUS__APPROVED    = 'approved';
    public const STATUS__DISAPPROVED = 'disapproved';
    public const STATUS__PENDING     = 'pending';

    public string $title;
    public string $text;
    public string $status;

    /**
     * @var int The rating of the product review. Must be one of 0,1,2,3,4,5
     */
    public int $rating;

    public string $email;
    public string $name;
    public string $date_reviewed;
    public int $id;
    public int $product_id;
    public string $date_created;
    public string $date_modified;
}
