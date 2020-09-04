<?php

namespace BigCommerce\ApiV3\Customers;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerResponse;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomersResponse;
use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\Tests\Customers\CustomerAddressesApiTest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

class CustomersApi extends CustomerApiBase
{
    public const FILTER__EMAIL_IN = 'email:in';

    private const RESOURCE_NAME = 'customers';

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomersResponse
    {
        return new CustomersResponse($this->getAllResources($filters, $page, $limit));
    }

    public function getByEmail(string $email): ?Customer
    {
        $customers = $this->getAll([self::FILTER__EMAIL_IN => $email])->getCustomers();

        if (!$customers[0]) {
            return null;
        } elseif (count($customers) > 1) {
            throw new UnexpectedValueException("There are more than one customer with the email address $email");
        }

        return $customers[0];
    }

    public function create(array $customers): CustomersResponse
    {
        return new CustomersResponse($this->createResources($customers));
    }

    public function update(array $customers): CustomersResponse
    {
        return new CustomersResponse($this->updateResources($customers));
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function addresses(): CustomerAddressesApi
    {
        return new CustomerAddressesApi($this->getClient());
    }

    public function attributes(): CustomerAttributesApi
    {
        return new CustomerAttributesApi($this->getClient());
    }

    public function attributeValues(): CustomerAttributeValuesApi
    {
        return new CustomerAttributeValuesApi($this->getClient());
    }
}
