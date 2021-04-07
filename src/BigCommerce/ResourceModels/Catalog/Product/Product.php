<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Product extends ResourceModel
{
    public const INVENTORY_TRACKING_NONE    = 'none';
    public const INVENTORY_TRACKING_PRODUCT = 'product';
    public const INVENTORY_TRACKING_VARIANT = 'variant';

    public const PRODUCT_TYPE_PHYSICAL = 'physical';
    public const PRODUCT_TYPE_DIGITAL  = 'digital';

    public int $id;
    public string $name;
    public string $type;
    public string $sku;
    public string $description;
    public float $weight;
    public float $width;
    public float $depth;
    public float $height;
    public float $price;
    public float $cost_price;
    public float $retail_price;
    public float $sale_price;
    public array $categories;
    public int $brand_id;
    public int $inventory_level;
    public int $inventory_warning_level;
    public string $inventory_tracking;
    public float $fixed_cost_shipping_price;
    public bool $is_free_shipping;
    public bool $is_visible;
    public bool $is_featured;
    public array $related_products;
    public string $warranty;
    public string $bin_picking_number;
    public string $layout_file;
    public string $upc;
    public string $mpn;
    public string $gtin;
    public string $search_keywords;
    public string $availability;
    public string $availability_description;
    public string $gift_wrapping_options_type;
    public array $gift_wrapping_options_list;
    public int $sort_order;
    public string $condition;
    public bool $is_condition_shown;
    public int $order_quantity_minimum;
    public int $order_quantity_maximum;
    public string $page_title;
    public array $meta_keywords;
    public string $meta_description;
    public string $date_created;
    public string $date_modified;
    public int $view_count;
    public ?object $preorder_release_date;
    public string $preorder_message;
    public bool $is_preorder_only;
    public bool $is_price_hidden;
    public string $price_hidden_label;
    public ?object $custom_url;
    public ?int $base_variant_id;
    public string $open_graph_type;
    public string $open_graph_title;
    public string $open_graph_description;
    public bool $open_graph_use_meta_description;
    public bool $open_graph_use_product_name;
    public bool $open_graph_use_image;
    public int $reviews_rating_sum;
    public int $total_sold;
    /**
     * @var CustomField[]|null
     */
    public ?array $custom_fields;
    /**
     * @var ProductModifier[]|null
     */
    public ?array $modifiers;

    public function __construct(?stdClass $optionObject = null)
    {
        if (!is_null($optionObject) && isset($optionObject->modifiers)) {
            $this->modifiers = array_map(function ($m) {
                return new ProductModifier($m);
            }, $optionObject->modifiers);
            unset($optionObject->modifiers);
        }

        parent::__construct($optionObject);
    }
}
