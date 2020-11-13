<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use Psr\Http\Message\ResponseInterface;

trait GetResource
{
    abstract public function singleResourceUrl(): string;
    abstract public function getClient(): Client;

    protected function getResource(): ResponseInterface
    {
        return $this->getClient()->getRestClient()->get($this->singleResourceUrl());
    }
}
