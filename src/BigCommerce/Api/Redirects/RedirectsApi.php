<?php

namespace BigCommerce\ApiV3\Api\Redirects;

use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Redirect\RedirectsResponse;

class RedirectsApi extends V3ApiBase
{
    use GetAllResources;
    use DeleteInIdList;
    use BatchUpdateResource;

    private const REDIRECTS_ENDPOINT = 'storefront/redirects';

    protected function maxBatchSize(): int
    {
        return 100;
    }

    public function multipleResourceUrl(): string
    {
        return self::REDIRECTS_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return $this->multipleResourceUrl();
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): RedirectsResponse
    {
        return new RedirectsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function batchUpdate(array $redirects): RedirectsResponse
    {
        return $this->upsert($redirects);
    }

    public function upsert(array $redirects): RedirectsResponse
    {
        return RedirectsResponse::buildFromMultipleResponses($this->batchUpdateResource($redirects));
    }
}
