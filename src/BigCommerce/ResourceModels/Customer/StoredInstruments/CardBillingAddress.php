<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer\StoredInstruments;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CardBillingAddress extends ResourceModel
{
    public string $first_name;
    public string $last_name;
    public string $company;
    public string $address1;
    public string $address2;
    public string $city;
    public string $state_or_province;
    public string $postal_code;
    public string $country_code;
    public string $state_or_province_code;
    public string $phone;
    public string $email;
}
