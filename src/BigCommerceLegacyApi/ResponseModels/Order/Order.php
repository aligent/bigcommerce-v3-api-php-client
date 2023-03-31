<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use BigCommerce\ApiV2\ResourceModels\Order\OrderBillingAddress;
use BigCommerce\ApiV2\ResourceModels\ResourceReference;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

class Order extends ResourceModel
{
    public ?int $id;
    public string $date_modified;
    public string $date_shipped;
    public ?string $cart_id;
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

    public ResourceReference $products;
    public ResourceReference $shipping_addresses;

    public object $coupons;

    public int $status_id;
    public string $base_handling_cost;
    public string $base_shipping_cost;
    public string $base_wrapping_cost;

    public OrderBillingAddress $billing_address;

    public int $channel_id;
    public int $customer_id;
    public ?string $customer_message;
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
    public string $ip_address_v6;
    public bool $is_deleted;
    public int $items_shipped;
    public int $items_total;
    public bool $order_is_digital;
    public string $payment_method;
    public ?string $payment_provider_id;
    public string $refunded_amount;
    public string $shipping_cost_ex_tax;
    public string $shipping_cost_inc_tax;
    public ?string $staff_notes;
    public string $subtotal_ex_tax;
    public string $subtotal_inc_tax;
    public string $tax_provider_id;
    public string $customer_locale;
    public string $total_ex_tax;
    public string $total_inc_tax;
    public string $wrapping_cost_ex_tax;
    public string $wrapping_cost_inc_tax;
    public string $custom_status;
    public string $total_tax;
    public ?string $credit_card_type;
    public ?string $external_merchant_id;
    public string $store_default_currency_code;
    public string $store_default_to_transactional_exchange_rate;



    public function __construct(?stdClass $optionObject = null)
    {
        if (isset($optionObject->billing_address)) {
            $this->billing_address = new OrderBillingAddress($optionObject->billing_address);
            unset($optionObject->billing_address);
        }

        if (isset($optionObject->products)) {
            $this->products = new ResourceReference($optionObject->products);
            unset($optionObject->products);
        }

        if (isset($optionObject->shipping_addresses)) {
            $this->shipping_addresses = new ResourceReference($optionObject->shipping_addresses);
            unset($optionObject->shipping_addresses);
        }

        parent::__construct($optionObject);
    }
}
