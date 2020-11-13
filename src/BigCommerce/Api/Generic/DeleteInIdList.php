<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\Client;
use GuzzleHttp\RequestOptions;

trait DeleteInIdList
{
    abstract public function multipleResourceUrl(): string;
    abstract public function getClient(): Client;

    public function delete(array $ids = []): bool
    {
        $response = $this->getClient()->getRestClient()->delete(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => [
                    'id:in' => implode(',', $ids)
                ]
            ]
        );

        return $response->getStatusCode() === 204;
    }
}
