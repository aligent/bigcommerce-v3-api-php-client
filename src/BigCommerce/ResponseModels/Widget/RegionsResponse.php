<?php

namespace BigCommerce\ApiV3\ResponseModels\Widget;

use BigCommerce\ApiV3\ResourceModels\Widget\Region;
use Psr\Http\Message\ResponseInterface;

class RegionsResponse
{
    /**
     * @var Region[]
     */
    private array $regions;

    public function __construct(ResponseInterface $response)
    {
        $this->regions = json_decode($response->getBody())->data;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }
}
