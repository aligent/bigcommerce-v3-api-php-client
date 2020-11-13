<?php

namespace BigCommerce\ApiV3\Scripts;

use BigCommerce\ApiV3\Api\DeleteResource;
use BigCommerce\ApiV3\Api\GetAllResources;
use BigCommerce\ApiV3\Api\GetResource;
use BigCommerce\ApiV3\Api\UuidResourceApi;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptResponse;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptsResponse;

class ScriptsApi extends UuidResourceApi
{
    use GetResource;
    use GetAllResources;
    use DeleteResource;

    private const SCRIPT_ENDPOINT  = 'content/scripts';
    private const SCRIPTS_ENDPOINT = 'content/scripts/%s';

    public function get(): ScriptResponse
    {
        return new ScriptResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ScriptsResponse
    {
        return new ScriptsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::SCRIPT_ENDPOINT, $this->getUuid());
    }

    public function multipleResourceUrl(): string
    {
        return self::SCRIPTS_ENDPOINT;
    }
}
