<?php

namespace BigCommerce\ApiV2\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class Order extends ResourceModel
{
    public ?int $id;
    public string $date_modified;
    public string $date_shipped;
    public string $cart_id;
    public string $status;
    public string $subtotal_tax;
    public string $shipping_cost_tax;
    public int $shipping_cost_tax_class_id;
    public string $handling_cost_tax;
    public int $handling_cost_tax_class_id;
    public string $wrapping_cost_tax;
    public int $wrapping_cost_tax_class_id;
    public string $payment_status;
    public string $store_credit_amount;
    public string $gift_certificate_amount;
    public int $currency_id;
    public string $currency_code;
    public string $currency_exchange_rate;
    public int $default_currency_id;
    public string $coupon_discount;
    public int $shipping_address_count;
    public bool $is_email_opt_in;
    public string $order_source;

    /**
     * @var OrderProduct[]
     */
    public array $products;

    /**
     * @var OrderShippingAddress[]
     */
    public array $shipping_addresses;

    public object $coupons;

    public int $status_id;
    public string $base_handling_cost;
    public string $base_shipping_cost;
    public string|float|int $base_wrapping_cost;

    public OrderBillingAddress $billing_address;

    public int $channel_id;
    public int $customer_id;
    public string $customer_message;
    public string $date_created;
    public string $default_currency_code;
    public string $discount_amount;
    public string $ebay_order_id;
    public ?string $external_id;
    public ?string $external_source;
    public string $geoip_country;
    public string $geoip_country_iso2;
    public string $handling_cost_ex_tax;
    public string $handling_cost_inc_tax;
    public string $ip_address;
    public bool $is_deleted;
    public int $items_shipped;
    public int $items_total;
    public bool $order_is_digital;
    public string $payment_method;
    public string|int|float $payment_provider_id;
    public string $refunded_amount;
    public string $shipping_cost_ex_tax;
    public string $shipping_cost_inc_tax;
    public string $staff_notes;
    public string $subtotal_ex_tax;
    public string $subtotal_inc_tax;
    public string $tax_provider_id;
    public string $customer_locale;
    public string $total_ex_tax;
    public string $total_inc_tax;
    public string $wrapping_cost_ex_tax;
    public string $wrapping_cost_inc_tax;
}
