<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResponseModels\Meta\Pagination;
use Psr\Http\Message\ResponseInterface;
use stdClass;

abstract class PaginatedResponse
{
    private Pagination $pagination;
    private array $data;

    public function __construct(ResponseInterface $response)
    {
        $rawData = json_decode($response->getBody());
        $this->decodeResponseData($rawData);
    }

    abstract protected function resourceClass(): string;

    protected function addData(array $data): void
    {
        $this->setData($this->mapDataAsClass($data, $this->resourceClass()));
    }

    private function decodeResponseData($rawData): void
    {
        $this->addData($rawData->data);
        $this->pagination = new Pagination($rawData->meta->pagination ?? null);
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    protected function mapDataAsClass(array $data, string $className): array
    {
        return array_map(function (stdClass $c) use ($className) {
            return new $className($c);
        }, $data);
    }

    protected function getData(): array
    {
        return $this->data;
    }

    protected function setData(array $data): void
    {
        $this->data = $data;
    }
}
