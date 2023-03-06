<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductImage extends ResourceModel
{
    public ?int $id;
    public ?int $product_id;
    public ?bool $is_thumbnail;
    public ?int $sort_order;
    public ?string $description;
    public ?string $image_file;
    public ?string $url_zoom;
    public ?string $url_standard;
    public ?string $url_thumbnail;
    public ?string $url_tiny;
    public ?string $date_modified;
    public ?string $image_url;
}
