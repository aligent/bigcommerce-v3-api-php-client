<?php

namespace BigCommerce\ApiV3\ResponseModels;

use BigCommerce\ApiV3\Api\FetchAllPages;
use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use Psr\Http\Message\ResponseInterface;

abstract class PaginatedBatchableResponse extends PaginatedResponse
{
    use FetchAllPages;

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
}
