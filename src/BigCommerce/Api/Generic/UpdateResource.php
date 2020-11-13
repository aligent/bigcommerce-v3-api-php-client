<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait UpdateResource
{
    abstract public function singleResourceUrl(): string;
    abstract public function getClient(): Client;

    protected function updateResource(object $resource): ResponseInterface
    {
        return $this->getClient()->getRestClient()->put(
            $this->singleResourceUrl(),
            [
                RequestOptions::JSON => $resource,
            ]
        );
    }
}
