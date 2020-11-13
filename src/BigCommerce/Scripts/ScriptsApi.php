<?php

namespace BigCommerce\ApiV3\Scripts;

use BigCommerce\ApiV3\Api\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptResponse;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptsResponse;

class ScriptsApi extends ResourceApi
{
    private const RESOURCE_NAME    = 'scripts';
    private const SCRIPT_ENDPOINT  = 'content/scripts';
    private const SCRIPTS_ENDPOINT = 'content/scripts/%d';

    protected function singleResourceEndpoint(): string
    {
        return self::SCRIPT_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::SCRIPTS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(): ScriptResponse
    {
        return new ScriptResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ScriptsResponse
    {
        return new ScriptsResponse($this->getAllResources($filters, $page, $limit));
    }
}
