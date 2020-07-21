<?php


namespace BigCommerce\ApiV3\Api;


use BigCommerce\ApiV3\Client;
use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

abstract class ResourceApi
{
    private Client $client;

    private ?int $resourceId;

    private ?int $parentResourceId;

    public function __construct(Client $client, ?int $resourceId = null, ?int $parentResourceId = null)
    {
        $this->client           = $client;
        $this->resourceId       = $resourceId;
        $this->parentResourceId = $parentResourceId;
    }

    public function getParentResourceId(): ?int
    {
        return $this->parentResourceId;
    }

    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    abstract protected function singleResourceEndpoint(): string;
    abstract protected function multipleResourcesEndpoint(): string;
    abstract protected function resourceName(): string;

    public function getClient(): Client
    {
        return $this->client;
    }

    protected function getResource(): ResponseInterface
    {
        return $this->getClient()->getRestClient()->get($this->singleResourceUrl());
    }

    protected function getAllResources(array $filters = [], int $page = 1, int $limit = 250): ResponseInterface
    {
        return $this->getClient()->getRestClient()->get(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => array_merge($filters, [
                    'page'  => $page,
                    'limit' => $limit,
                ])
            ]
        );
    }

    protected function createResource(object $resource): ResponseInterface
    {
        return $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $resource,
            ]
        );
    }

    protected function updateResource(object $resource): ResponseInterface
    {
        return $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => $resource,
            ]
        );
    }

    public function delete(): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete($this->singleResourceUrl());
    }

    protected function singleResourceUrl(): string
    {
        if (is_null($this->resourceId)) {
            throw new UnexpectedValueException("A {$this->resourceName()} id must be to be set");
        }

        return sprintf(
            $this->singleResourceEndpoint(),
            $this->getParentResourceId() ?? $this->getResourceId(),
            $this->getResourceId()
        );
    }

    protected function multipleResourceUrl(): string
    {
        return sprintf($this->multipleResourcesEndpoint(), $this->getParentResourceId());
    }

    abstract public function get(): SingleResourceResponse;
    abstract public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse;
}
