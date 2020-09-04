<?php

namespace BigCommerce\ApiV3\Customers;

use BigCommerce\ApiV3\Api\GetAllFromBigCommerce;
use BigCommerce\ApiV3\Api\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

abstract class CustomerApiBase extends V3ApiBase
{
    use GetAllFromBigCommerce;

    public const FILTER__ID_IN = 'id:in';

    private const CUSTOMERS = 'customers';

    abstract protected function resourceName(): string;
    abstract public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse;
    abstract public function create(array $resources): PaginatedResponse;
    abstract public function update(array $resources): PaginatedResponse;

    public function delete(array $ids = []): bool
    {
        $response = $this->getClient()->getRestClient()->delete(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => [
                    self::FILTER__ID_IN => implode(',', $ids)
                ]
            ]
        );

        return $response->getStatusCode() === 204;
    }

    private function multipleResourceUrl(): string
    {
        return $this->resourceName() !== self::CUSTOMERS
            ? self::CUSTOMERS . '/' . $this->resourceName() : self::CUSTOMERS;
    }

    protected function createResources(array $resources): ResponseInterface
    {
        return $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $resources,
            ]
        );
    }

    protected function updateResources(array $resources): ResponseInterface
    {
        return $this->getClient()->getRestClient()->put(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $resources,
            ]
        );
    }
}
