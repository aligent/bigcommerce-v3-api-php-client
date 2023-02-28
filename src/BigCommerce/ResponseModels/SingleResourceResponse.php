<?php

namespace BigCommerce\ApiV3\ResponseModels;

use Psr\Http\Message\ResponseInterface;
use stdClass;

abstract class SingleResourceResponse
{
    public function __construct(ResponseInterface $response)
    {
        $this->addData($this->decodeResponseBody(json_decode($response->getBody())));
    }

    protected function decodeResponseBody(object $responseBody): object
    {
        return $responseBody->data;
    }

    abstract protected function addData(stdClass $rawData): void;
}
