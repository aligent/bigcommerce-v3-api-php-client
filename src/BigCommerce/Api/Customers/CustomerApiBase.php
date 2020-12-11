<?php

namespace BigCommerce\ApiV3\Api\Customers;

use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

abstract class CustomerApiBase extends V3ApiBase
{
    use GetAllResources;

    private const CUSTOMERS = 'customers';

    abstract protected function resourceName(): string;
    abstract public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse;
    abstract public function create(array $resources): PaginatedResponse;
    abstract public function update(array $resources): PaginatedResponse;

    protected function multipleResourceUrl(): string
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
