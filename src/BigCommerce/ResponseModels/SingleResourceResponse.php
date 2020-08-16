<?php

namespace BigCommerce\ApiV3\ResponseModels;

use Psr\Http\Message\ResponseInterface;
use stdClass;

abstract class SingleResourceResponse
{
    public function __construct(ResponseInterface $response)
    {
        $this->addData(json_decode($response->getBody())->data);
    }

    abstract protected function addData(stdClass $rawData): void;
}
