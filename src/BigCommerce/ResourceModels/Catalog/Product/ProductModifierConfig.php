<?php

namespace BigCommerce\ApiV3\ResourceModels\Catalog\Product;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ProductModifierConfig extends ResourceModel
{
    public const PRODUCT_LIST_SHIPPING_NONE       = 'none';
    public const PRODUCT_LIST_SHIPPING_BY_WEIGHT  = 'weight';
    public const PRODUCT_LIST_SHIPPING_BY_PACKAGE = 'package';

    public ?string $default_value;
    public ?bool $checked_by_default;
    public ?string $checkbox_label;

    public ?bool $date_limited;
    public ?string $date_limit_mode;
    public ?string $date_earliest_value;
    public ?string $date_latest_value;

    public ?string $file_types_mode;
    public ?array $file_types_supported;
    public ?array $file_types_other;
    public ?int $file_max_size;

    public ?bool $text_characters_limited;
    public ?int $text_min_length;
    public ?int $text_max_length;
    public ?bool $text_lines_limited;
    public ?int $text_max_lines;

    public ?bool $number_limited;
    public ?string $number_limit_mode;
    public ?float $number_lowest_value;
    public ?float $number_highest_value;
    public ?bool $number_integers_only;

    public ?bool $product_list_adjusts_inventory;
    public ?bool $product_list_adjusts_pricing;
    public ?string $product_list_shipping_calc;
}
