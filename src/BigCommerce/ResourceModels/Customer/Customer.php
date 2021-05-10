<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use stdClass;

/**
 * @package BigCommerce\ApiV3\ResourceModels
 */
class Customer extends ResourceModel
{
    /**
     * Typically need either an ID or an email in order to do anything useful with an existing customer
     */
    public int $id;
    public string $email;
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

    /**
     * @var CustomerAddress[]
     */
    public array $addresses;

    /**
     * @var CustomerAttributeValue[]
     */
    public array $attributes;

    /**
     * @var CustomerFormFieldValue[]
     */
    public array $form_fields;

    public ?CustomerAuthentication $authentication;


    protected function beforeBuildObject(): void
    {
        $this->buildObjectArray('addresses', CustomerAddress::class);
        $this->buildObjectArray('attributes', CustomerAttributeValue::class);
        $this->buildObjectArray('form_fields', CustomerFormFieldValue::class);
        $this->buildPropertyObject('authentication', CustomerAuthentication::class);
    }
}
