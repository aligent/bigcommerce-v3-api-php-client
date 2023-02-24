<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\Api\Subscribers\SubscribersApi;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomersResponse;
use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\ApiV3\ResponseModels\Customer\StoredInstrumentsResponse;
use BigCommerce\ApiV3\ResponseModels\Customer\ValidateCredentialsResponse;
use GuzzleHttp\RequestOptions;
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

        if (count($customers) === 0) {
            return null;
        } elseif (count($customers) > 1) {
            throw new UnexpectedValueException("There is more than one customer with the email address $email");
        }

        return $customers[0];
    }

    public function getById(int $id): ?Customer
    {
        $customers = $this->getAll([self::FILTER__ID_IN => $id])->getCustomers();

        return $customers[0] ?? null;
    }

    public function getStoredInstruments(): StoredInstrumentsResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            sprintf('customers/%d/stored-instruments', $this->getResourceId())
        );

        return new StoredInstrumentsResponse($response);
    }

    public function create(array $customers): CustomersResponse
    {
        return new CustomersResponse($this->createResources($customers));
    }

    public function update(array $customers): CustomersResponse
    {
        return new CustomersResponse($this->updateResources($customers));
    }

    public function validateCredentials(
        string $email,
        string $password,
        ?int $channel_id = null
    ): ValidateCredentialsResponse {
        $credentials = ['email' => $email, 'password' => $password];
        if (!is_null($channel_id)) {
            $credentials['channel_id'] = $channel_id;
        }

        $response = $this->getClient()->getRestClient()->post(
            'customers/validate-credentials',
            [
                RequestOptions::JSON => $credentials,
            ]
        );

        return new ValidateCredentialsResponse($response);
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

    public function settings(): CustomerSettingsApi
    {
        return new CustomerSettingsApi($this->getClient());
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
