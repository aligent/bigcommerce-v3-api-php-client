<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductVideo extends ResourceModel
{
    public const TYPE__YOUTUBE = 'youtube';

    public string $title;
    public string $description;
    public int $sort_order;
    public string $type;
    public string $video_id;
    public int $id;
    public int $product_id;
    public string $length;
}
