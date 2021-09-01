<?php
namespace BigCommerce\ApiV2\ResourceModels\StoreInformation;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class StoreInformation extends ResourceModel
{
    public string $id;
    public string $domain;
    public string $secure_url;
    public string $control_panel_base_url;
    public string $status;
    public string $name;
    public string $first_name;
    public string $last_name;
    public string $address;
    public string $country;
    public string $country_code;
    public string $phone;
    public string $admin_email;
    public string $order_email;
    public string $favicon_url;
    public object $timezone;
    public string $language;
    public string $currency;
    public string $currency_symbol;
    public string $decimal_separator;
    public string $thousands_separator;
    public string $decimal_places;
    public string $currency_symbol_location;
    public string $weight_units;
    public string $dimension_units;
    public string $dimension_decimal_places;
    public string $dimension_decimal_token;
    public string $dimension_thousands_token;
    public string $plan_name;
    public string $plan_level;
    public string $industry;
    public object $logo;
    public string $is_price_entered_with_tax;
    public array $active_comparison_modules;
    public object $features;
}