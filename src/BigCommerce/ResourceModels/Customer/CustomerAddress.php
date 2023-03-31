<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerAddress extends ResourceModel
{
    public string $first_name;
    public string $last_name;
    public string $address1;
    public string $address2;
    public string $city;
    public string $state_or_province;
    public string $postal_code;
    public string $country_code;
    public string $phone;
    public string $address_type;
    public int $customer_id;
    public ?string $company;
}
