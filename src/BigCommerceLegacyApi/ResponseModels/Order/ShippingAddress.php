<?php

namespace BigCommerce\ApiV2\ResponseModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class ShippingAddress extends ResourceModel
{
    public int $id;
    public int $order_id;
    public int $items_total;
    public int $items_shipped;
    public string $base_cost;
    public string $cost_ex_tax;
    public string $cost_inc_tax;
    public string $cost_tax;
    public int $cost_tax_class_id;
    public string $base_handling_cost;
    public string $handling_cost_ex_tax;
    public string $handling_cost_inc_tax;
    public string $handling_cost_tax;
    public int $handling_cost_tax_class_id;
    public int $shipping_zone_id;
    public string $shipping_zone_name;
    public array $form_fields;
    public object $shipping_quotes;
    public string $first_name;
    public string $last_name;
    public ?string $company;
    public string $street_1;
    public string $street_2;
    public string $city;
    public string $state;
    public string $zip;
    public string $country;
    public string $country_iso2;
    public string $phone;
    public string $email;
    public string $shipping_method;
}
