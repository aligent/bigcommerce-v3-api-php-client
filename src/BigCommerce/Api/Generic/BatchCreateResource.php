<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait BatchCreateResource
{
    abstract public function batchCreate(array $resources): PaginatedResponse;
    abstract protected function multipleResourcesEndpoint(): string;
    abstract public function getClient(): Client;

    protected function maxCreateBatchSize(): int
    {
        return 10;
    }

    /**
     * @param array $resources
     * @return ResponseInterface[]
     */
    protected function batchCreateResource(array $resources): array
    {
        $chunks = array_chunk($resources, $this->maxCreateBatchSize());
        $responses = [];
        foreach ($chunks as $chunk) {
            $responses[] = $this->getClient()->getRestClient()->post(
                $this->multipleResourcesEndpoint(),
                [
                    RequestOptions::JSON => $chunk,
                ]
            );
        }

        return $responses;
    }
}
