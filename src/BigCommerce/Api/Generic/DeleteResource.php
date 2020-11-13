<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use Psr\Http\Message\ResponseInterface;

trait DeleteResource
{
    abstract public function singleResourceUrl(): string;
    abstract public function getClient(): Client;

    public function delete(): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete($this->singleResourceUrl());
    }
}
