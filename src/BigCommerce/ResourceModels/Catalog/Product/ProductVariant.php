<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductVariant extends ResourceModel
{
    public int $id;
    public int $product_id;
    public string $sku;
    public ?int $sku_id;
    public ?float $price;
    public ?float $calculated_price;
    public ?float $map_price;
    public ?float $sale_price;
    public ?float $retail_price;
    public ?float $weight;
    public ?float $width;
    public ?float $height;
    public ?float $depth;
    public bool $is_free_shipping;
    public ?float $fixed_cost_shipping_price;
    public bool $purchasing_disabled;
    public string $purchasing_disabled_message;
    public string $image_url;
    public ?float $cost_price;
    public string $upc;
    public string $mpn;
    public string $gtin;
    public int $inventory_level;
    public int $inventory_warning_level;
    public string $bin_picking_number;
    public array $option_values;
    public float $calculated_weight;
}
