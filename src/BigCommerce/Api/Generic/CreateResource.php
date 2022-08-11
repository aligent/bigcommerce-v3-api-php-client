<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\BaseApiClient;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait CreateResource
{
    abstract public function multipleResourceUrl(): string;
    abstract public function getClient(): BaseApiClient;

    protected function createResource(object $resource, array $query = []): ResponseInterface
    {
        return $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $resource,
                RequestOptions::QUERY => $query,
            ]
        );
    }
}
