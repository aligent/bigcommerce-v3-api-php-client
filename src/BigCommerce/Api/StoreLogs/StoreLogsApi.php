<?php

namespace BigCommerce\ApiV3\Api\StoreLogs;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\StoreLogs\SystemLogsResponse;
use GuzzleHttp\RequestOptions;

class StoreLogsApi extends V3ApiBase
{
    public const SYSTEM_LOGS_ENDPOINT = 'store/systemlogs';

    public function get(array $queryParams = []): SystemLogsResponse
    {
        return new SystemLogsResponse($this->getClient()->getRestClient()->get(
            self::SYSTEM_LOGS_ENDPOINT,
            [
                RequestOptions::QUERY => $queryParams,
            ]
        ));
    }
}
