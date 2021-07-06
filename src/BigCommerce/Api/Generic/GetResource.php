<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\BaseApiClient;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait GetResource
{
    abstract public function singleResourceUrl(): string;
    abstract public function getClient(): BaseApiClient;

    protected function getResource(array $queryParams = []): ResponseInterface
    {
        return $this->getClient()->getRestClient()->get(
            $this->singleResourceUrl(),
            [
                RequestOptions::QUERY => $queryParams,
            ]
        );
    }
}
