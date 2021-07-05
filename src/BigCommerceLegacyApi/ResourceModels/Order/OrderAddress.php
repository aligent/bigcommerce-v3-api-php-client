<?php

namespace BigCommerce\ApiV2\ResourceModels\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

abstract class OrderAddress extends ResourceModel
{
    public string $first_name;
    public string $last_name;
    public string $company;
    public string $street_1;
    public string $street_2;
    public string $city;
    public string $state;
    public string $zip;
    public string $country;
    public string $country_iso2;
    public string $phone;
    public string $email;
}
