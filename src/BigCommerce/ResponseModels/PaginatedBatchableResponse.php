<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\ResourceModel;
use Closure;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

abstract class PaginatedBatchableResponse extends PaginatedResponse
{
    abstract protected function getData(): array;
    abstract protected function setData(array $data): void;

    private function appendData(array $data): array
    {
        $this->setData(array_merge($this->getData(), $data));
        return $this->getData();
    }

    /**
     * @param ResponseInterface[] $responses
     * @return static
     */
    public static function BuildFromMultipleResponses(array $responses): ?PaginatedResponse
    {
        $data = [];
        $paginatedResponse = null;

        foreach ($responses as $response) {
            $paginatedResponse = new static($response);
            $data = $paginatedResponse->appendData($data);
        }

        return $paginatedResponse;
    }

    /**
     * @param Closure $request Must return a ResponseInterface
     * @return static
     */
    public static function BuildFromAllPages(Closure $request): ?PaginatedResponse
    {
        $response = $request(1);
        if (!$response instanceof ResponseInterface) {
            throw new InvalidArgumentException('Closure passed must return ResponseInterface');
        }

        $responseObject = new static($response);
        $data = $responseObject->getData();

        while ($responseObject->getPagination()->current_page < $responseObject->getPagination()->total_pages) {
            $responseObject = new static($request($responseObject->getPagination()->current_page + 1));
            $data = $responseObject->appendData($data);
        }

        return $responseObject;
    }
}
