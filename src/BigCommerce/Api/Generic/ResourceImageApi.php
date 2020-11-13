<?php

namespace BigCommerce\ApiV3\Api\Generic;

use BigCommerce\ApiV3\ResponseModels\PaginatedResponse;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use UnexpectedValueException;

abstract class ResourceImageApi extends ResourceApi
{
    use CreateImage;

    private const RESOURCE_NAME = 'image';

    protected function multipleResourcesEndpoint(): string
    {
        return $this->singleResourceEndpoint();
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): SingleResourceResponse
    {
        throw new UnexpectedValueException('There is no endpoint for fetching an image');
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): PaginatedResponse
    {
        throw new UnexpectedValueException('There is no endpoint for fetching all images');
    }
}
