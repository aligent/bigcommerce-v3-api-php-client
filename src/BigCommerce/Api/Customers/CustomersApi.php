<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\Api\Subscribers\SubscribersApi;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomersResponse;
use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use UnexpectedValueException;

class CustomersApi extends CustomerApiBase
{
    use DeleteInIdList;

    public const FILTER__EMAIL_IN = 'email:in';
    public const FILTER__ID_IN = 'id:in';

    private const RESOURCE_NAME = 'customers';

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomersResponse
    {
        return new CustomersResponse($this->getAllResources($filters, $page, $limit));
    }

    public function getAllPages(array $filter = []): CustomersResponse
    {
        return CustomersResponse::buildFromAllPages(function ($page) use ($filter) {
            return $this->getAllResources($filter, $page, 200);
        });
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

    public function getById(int $id): ?Customer
    {
        $customers = $this->getAll([self::FILTER__ID_IN => $id])->getCustomers();

        return $customers[0] ?? null;
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

    public function formFieldValues(): CustomerFormFieldValuesApi
    {
        return new CustomerFormFieldValuesApi($this->getClient());
    }

    public function consent(): CustomerConsentApi
    {
        if (!$this->getResourceId()) {
            throw new UnexpectedValueException('Customer ID must be set');
        }

        return new CustomerConsentApi($this->getClient(), null, $this->getResourceId());
    }

    public function subscriber(int $id): SubscribersApi
    {
        return new SubscribersApi($this->getClient(), $id, $this->getParentResourceId());
    }

    public function subscribers(): SubscribersApi
    {
        return new SubscribersApi($this->getClient(), null, $this->getParentResourceId());
    }
}
