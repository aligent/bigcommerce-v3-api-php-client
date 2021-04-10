<?php

namespace BigCommerce\ApiV3\Api\Scripts;

use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use BigCommerce\ApiV3\Api\Generic\UuidResourceApi;
use BigCommerce\ApiV3\ResourceModels\Script\Script;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptResponse;
use BigCommerce\ApiV3\ResponseModels\Script\ScriptsResponse;

class ScriptsApi extends UuidResourceApi
{
    use GetResource;
    use GetAllResources;
    use DeleteResource;
    use UpdateResource;
    use CreateResource;

    private const SCRIPT_ENDPOINT  = 'content/scripts/%s';
    private const SCRIPTS_ENDPOINT = 'content/scripts';

    public function get(): ScriptResponse
    {
        return new ScriptResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ScriptsResponse
    {
        return new ScriptsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function update(Script $script): ScriptResponse
    {
        return new ScriptResponse($this->updateResource($script));
    }

    public function create(Script $script): ScriptResponse
    {
        return new ScriptResponse($this->createResource($script));
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
