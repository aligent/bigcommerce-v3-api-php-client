<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

abstract class ResourceWithBatchUpdateApi extends ResourceApi
{
    use BatchUpdateResource;
}
