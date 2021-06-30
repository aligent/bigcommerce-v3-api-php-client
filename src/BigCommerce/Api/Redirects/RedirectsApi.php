<?php

namespace BigCommerce\ApiV3\Api\Redirects;

use BigCommerce\ApiV3\Api\Generic\BatchUpdateResource;
use BigCommerce\ApiV3\Api\Generic\DeleteInIdList;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use BigCommerce\ApiV3\ResponseModels\Redirect\RedirectsResponse;

/**
 * Redirects API
 *
 * For management of storefront redirects.
 *
 * Example for adding a generated list of nonsense redirects. All urls of the format `/old-url/[1-50]` will be
 * redirected to product 1, at url `/new-url/1`.
 *
 * ```php
 * $api = new BigCommerce\ApiV3\Client($_ENV['hash'], $_ENV['CLIENT_ID'], $_ENV['ACCESS_TOKEN']);
 *
 * $range = range(1, 50);
 * $redirects = [];
 *
 * $redirectTo = new RedirectTo();
 * $redirectTo->type      = RedirectTo::TYPE__PRODUCT;
 * $redirectTo->entity_id = 1;
 * $redirectTo->url       = '/new-url/1'
 *
 * foreach ($range as $i) {
 *   $redirect = new Redirect();
 *   $redirect->from_path = "/old-url/$i";
 *   $redirect->site_id   = 0;
 *
 *   $redirects[] = $redirect;
 * }
 *
 * $api->redirects()->upsert($redirects);
 * ```
 *
 */
class RedirectsApi extends V3ApiBase
{
    use GetAllResources;
    use DeleteInIdList;
    use BatchUpdateResource;

    private const REDIRECTS_ENDPOINT = 'storefront/redirects';

    protected function maxBatchSize(): int
    {
        return 50;
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
