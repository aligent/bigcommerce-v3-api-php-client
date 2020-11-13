<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\ResponseModels\Meta\Pagination;
use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use Closure;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

trait FetchAllPages
{
    abstract protected function getData(): array;
    abstract protected function setData(array $data): void;
    abstract public function getPagination(): Pagination;

    abstract public function __construct(ResponseInterface $response);

    private function appendData(array $data): array
    {
        $this->setData(array_merge($this->getData(), $data));
        return $this->getData();
    }

    /**
     * @param Closure $request Must return a ResponseInterface
     * @return static
     */
    public static function buildFromAllPages(Closure $request): ?PaginatedResponse
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
