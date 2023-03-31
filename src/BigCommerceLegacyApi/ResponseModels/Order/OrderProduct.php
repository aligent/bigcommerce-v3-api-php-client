<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use stdClass;

class OrderProduct extends \BigCommerce\ApiV3\ResourceModels\ResourceModel
{
    public int $id;
    public int $order_id;
    public int $order_address_id;
    public string $name;
    public string $name_customer;
    public string $sku;
    public string $type; // physical, digital
    public string $base_price;
    public string $price_ex_tax;
    public string $price_inc_tax;
    public string $price_tax;
    public float $quantity;
    public string $base_cost_price;
    public string $cost_price_inc_tax;
    public string $cost_price_ex_tax;
    public string $weight;
    public string $cost_price_tax;
    public bool $is_refunded;
    public string $refunded_amount;
    public int $return_id;
    public ?string $wrapping_name;
    public string $base_wrapping_cost;
    public string $wrapping_cost_ex_tax;
    public string $wrapping_cost_inc_tax;
    public string $wrapping_cost_tax;
    public ?string $wrapping_message;
    public int $quantity_shipped;
    public ?string $event_name;
    public ?string $event_date;
    public string $fixed_shipping_cost;
    public ?string $ebay_item_id;
    public ?string $ebay_transaction_id;
    public ?int $option_set_id;
    public ?int $parent_order_product_id;
    public bool $is_bundled_product;
    public ?string $bin_picking_number;
    public array $applied_discounts;

    /**
     * @var OrderProductOption[]
     */
    public array $product_options;
    public ?string $external_id;
    public ?string $upc;
    public ?int $variant_id;
    public string $name_merchant;
    public int $product_id;
    public string $base_total;
    public string $total_ex_tax;
    public string $total_inc_tax;
    public string $total_tax;
    public string $quantity_refunded;
    public string $refund_amount;
    public string $fulfillment_source;
    public array $configurable_fields;

    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->product_options)) {
            $this->product_options = array_map(fn($p) => new OrderProductOption($p), $optionObject->product_options);
            unset($optionObject->product_options);
        }
        parent::__construct($optionObject);
    }
}
