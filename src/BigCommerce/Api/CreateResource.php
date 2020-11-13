<?php

namespace BigCommerce\ApiV3\Api;

use BigCommerce\ApiV3\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait CreateResource
{
    abstract public function multipleResourceUrl(): string;
    abstract public function getClient(): Client;

    protected function createResource(object $resource): ResponseInterface
    {
        return $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $resource,
            ]
        );
    }
}