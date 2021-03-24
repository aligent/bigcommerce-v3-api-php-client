<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

trait BatchUpdateResource
{
    abstract public function batchUpdate(array $resources): PaginatedResponse;
    abstract protected function multipleResourcesEndpoint(): string;
    abstract public function getClient(): Client;

    protected function maxBatchSize(): int
    {
        return 10;
    }

    /**
     * @param array $resources
     * @return ResponseInterface[]
     */
    protected function batchUpdateResource(array $resources): array
    {
        $chunks = array_chunk($resources, $this->maxBatchSize());
        $responses = [];
        foreach ($chunks as $chunk) {
            $responses[] = $this->getClient()->getRestClient()->put(
                $this->multipleResourcesEndpoint(),
                [
                    RequestOptions::JSON => $chunk,
                ]
            );
        }

        return $responses;
    }
}
