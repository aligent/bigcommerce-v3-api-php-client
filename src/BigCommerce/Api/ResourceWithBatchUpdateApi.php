<?php

namespace BigCommerce\ApiV3\Api;

use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

abstract class ResourceWithBatchUpdateApi extends ResourceApi
{
    protected const MAX_BATCH_SIZE = 10;

    abstract public function batchUpdate(array $resources): PaginatedResponse;

    /**
     * @param array $resources
     * @return ResponseInterface[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function batchUpdateResource(array $resources): array
    {
        $chunks = array_chunk($resources, self::MAX_BATCH_SIZE);
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
