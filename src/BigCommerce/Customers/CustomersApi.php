<?php

namespace BigCommerce\ApiV3\Customers;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomerResponse;
use BigCommerce\ApiV3\ResponseModels\Customer\CustomersResponse;
use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

class CustomersApi extends ResourceApi
{
    public const RESOURCE_NAME       = 'customers';
    public const CUSTOMERS_ENDPOINT = 'customers';
    public const CUSTOMER_ENDPOINT   = 'customer/%d';


    public function get(): CustomerResponse
    {
        return new CustomerResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): CustomersResponse
    {
        return new CustomersResponse($this->getAllResources($filters, $page, $limit));
    }

    public function getByEmail($email): ?Customer
    {
        $customers = $this->getAll(['email:in' => $email])->getCustomers();

        if (!$customers[0]) {
            return null;
        } elseif (count($customers) > 1) {
            throw new UnexpectedValueException("There are more than one customer with the email address $email");
        }

        return $customers[0];
    }

    /** the Customers API allows us to delete a batch of customers at a time by passing an a query string containing a
     * list of Customer IDs
     * @param array $ids
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function deleteIn(array $ids): ResponseInterface
    {
        $ids = implode(",", $ids);
        $resource = ["id:in" => $ids];

        return $this->getClient()->getRestClient()->delete(
            $this->multipleResourcesEndpoint(),
            [
                RequestOptions::QUERY => $resource,
            ]
        );
    }

    public function create(Customer $category): CustomerResponse
    {
        return new CustomerResponse($this->createResource($category));
    }

    public function update(Customer $category): CustomerResponse
    {
        return new CustomerResponse($this->updateResource($category));
    }

    protected function singleResourceEndpoint(): string
    {
        return self::CUSTOMER_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CUSTOMERS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }
}
