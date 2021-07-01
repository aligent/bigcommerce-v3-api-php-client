<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

trait BatchUpdateResource
{
    abstract public function batchUpdate(array $resources): PaginatedResponse;
    abstract protected function multipleResourcesEndpoint(): string;
    abstract public function getClient(): Client;

    private int $maxRetries = 0;

    protected function maxBatchSize(): int
    {
        return 10;
    }

    /**
     * @param array $resources
     * @return ResponseInterface[]
     * @throws RequestExceptionInterface
     */
    protected function batchUpdateResource(array $resources): array
    {
        $chunks = array_chunk($resources, $this->maxBatchSize());
        return array_map(fn($chunk) => $this->putRequestWithRetries($chunk), $chunks);
    }

    private function putRequestWithRetries($data): ResponseInterface
    {
        $retriesRemaining = $this->getMaxRetries() + 1;

        while ($retriesRemaining-- > 0) {
            try {
                return $this->getClient()->getRestClient()->put(
                    $this->multipleResourcesEndpoint(),
                    [
                        RequestOptions::JSON => $data,
                    ]
                );
            } catch (\Exception $exception) {
                if (!in_array($exception->getCode(), $this->retryOnErrorCodes()) || $retriesRemaining <= 0) {
                    throw $exception;
                }
            }
        }
    }

    protected function retryOnErrorCodes(): array
    {
        return [500, 502, 503, 504];
    }

    public function getMaxRetries(): int
    {
        return $this->maxRetries;
    }

    public function setMaxRetries(int $maxRetries): void
    {
        $this->maxRetries = $maxRetries;
    }
}
