<?php

namespace BigCommerce\ApiV2\Api\StoreInformation;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV2\ResourceModels\StoreInformation\StoreInformation;

class StoreInformationApi extends V2ApiBase
{
    private const STORE_INFORMATION_ENDPOINT = 'store';
    private const SYSTEM_TIMESTAMP_ENDPOINT = 'time';

    /**
     * Returns metadata about a store.
     *
     * @return StoreInformation
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @deprecated Replaced by `get()` function.
     */
    public function storeInformation(): StoreInformation
    {
        return $this->get();
    }

    /**
     * Returns metadata about a store.
     *
     * @return StoreInformation
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(): StoreInformation
    {
        $response = $this->getClient()->getRestClient()->get(
            self::STORE_INFORMATION_ENDPOINT
        );

        return new StoreInformation(json_decode($response->getBody()));
    }

    /**
     * Returns the system timestamp at the time of the request.
     *
     * The time resource is useful for validating API authentication details and testing client connections.
     *
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function time(): int
    {
        $response = $this->getClient()->getRestClient()->get(
            self::SYSTEM_TIMESTAMP_ENDPOINT
        );

        return json_decode($response->getBody())->time;
    }
}
