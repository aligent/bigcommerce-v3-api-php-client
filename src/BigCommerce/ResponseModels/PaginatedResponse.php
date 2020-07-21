<?php


namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\ResponseModels\Meta\Pagination;
use Psr\Http\Message\ResponseInterface;

abstract class PaginatedResponse
{
    private Pagination $pagination;

    public function __construct(ResponseInterface $response) {
        $rawData = json_decode($response->getBody());
        $this->decodeResponseData($rawData);
    }

    abstract protected function addData(array $data): void;

    private function decodeResponseData($rawData): void
    {
        $this->addData($rawData->data);
        $this->pagination = new Pagination($rawData->meta->pagination);
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}
