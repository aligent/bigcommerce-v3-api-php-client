<?php
namespace BigCommerce\ApiV2\Api\StoreInformation;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use GuzzleHttp\RequestOptions;

class StoreInformationApi extends V2ApiBase
{
    private const STORE_INFORMATION_ENDPOINT = 'store';
    private const SYSTEM_TIMESTAMP_ENDPOINT = 'time';

    public function storeInformation(): void
    {

    }

    /**
     * Returns the system timestamp at the time of the request.
     *
     * The time resource is useful for validating API authentication details and testing client connections.
     *
     * @return int
     */
    public function time(): int
    {
        $response = $this->getClient()->getRestClient()->get(
            self::SYSTEM_TIMESTAMP_ENDPOINT
        );

        return json_decode($response->getBody())->time;
    }
}
