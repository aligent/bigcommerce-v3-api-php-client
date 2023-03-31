<?php

namespace BigCommerce\ApiV3\ResourceModels\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

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
    public int $customer_group_id;
    public string $notes;
    public string $tax_exempt_category;
    public bool $accepts_product_review_abandoned_cart_emails;
    public ?array $store_credit_amounts;
    public ?int $origin_channel_id;
    public ?array $channel_ids;
    public ?string $registration_ip_address;
    public string $date_created;
    public string $date_modified;

    /**
     * @var CustomerAddress[]
     */
    public array $addresses;

    /**
     * @var AttributeValue[]
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
        $this->buildObjectArray('attributes', AttributeValue::class);
        $this->buildObjectArray('form_fields', CustomerFormFieldValue::class);
        $this->buildPropertyObject('authentication', CustomerAuthentication::class);
    }
}
